<?php

namespace ZanPHP\TcpServer;

use \swoole_server as SwooleServer;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Foundation\Application;
use ZanPHP\Contracts\Trace\Trace;
use ZanPHP\Coroutine\Context;
use ZanPHP\Coroutine\Signal;
use ZanPHP\Coroutine\Task;
use ZanPHP\Exception\Network\ExcessConcurrencyException;
use ZanPHP\Exception\Network\ServerTimeoutException;
use ZanPHP\Hawk\Hawk;
use ZanPHP\Log\Log;
use ZanPHP\ServerBase\Middleware\MiddlewareManager;
use ZanPHP\Support\Time;
use ZanPHP\Timer\Timer;
use ZanPHP\WorkerMonitor\WorkerMonitor;

class RequestHandler
{
    /* @var $swooleServer SwooleServer */
    private $swooleServer;

    /* @var $context Context */
    private $context;

    /* @var $request Request */
    private $request;

    /* @var $response Response */
    private $response;

    private $fd = null;

    private $fromId = null;

    /* @var $task Task */
    private $task;

    /* @var $middleWareManager MiddlewareManager*/
    private $middleWareManager;

    const DEFAULT_TIMEOUT = 30 * 1000;

    public function __construct()
    {
        $this->context = new Context();
        $this->event = $this->context->getEvent();
    }

    public function handle(SwooleServer $swooleServer, $fd, $fromId, $data)
    {
        $this->swooleServer = $swooleServer;
        $this->fd = $fd;
        $this->fromId = $fromId;
        $this->doRequest($data);
    }

    private function doRequest($data)
    {
        $request = new Request($this->fd, $this->fromId, $data, $this->swooleServer);
        $response = $this->response = new Response($this->swooleServer, $request);

        $this->context->set('request', $request);
        $this->context->set('swoole_response', $this->response);
        $this->context->set('request_time', Time::stamp());
        $repository = make(Repository::class);
        $request_timeout = $repository->get('server.request_timeout');
        $request_timeout = $request_timeout ? $request_timeout : self::DEFAULT_TIMEOUT;
        $this->context->set('request_timeout', $request_timeout);
        $this->context->set('request_end_event_name', $this->getRequestFinishJobId());

        try {
            $result = $request->decode();
            $this->request = $request;
            if ($request->getIsHeartBeat()) {
                $this->swooleServer->send($this->fd, $result);
                return;
            }
            $request->setStartTime();

            $this->middleWareManager = new MiddlewareManager($request, $this->context);

            $isAccept = WorkerMonitor::instance()->reactionReceive();
            //限流
            if (!$isAccept) {
                throw new ExcessConcurrencyException('现在访问的人太多,请稍后再试..', 503);
            }

            $requestTask = new RequestTask($request, $response, $this->context, $this->middleWareManager);
            $coroutine = $requestTask->run();

            //bind event
            $this->event->once($this->getRequestFinishJobId(), [$this, 'handleRequestFinish']);
            Timer::after($request_timeout, [$this, 'handleTimeout'], $this->getRequestTimeoutJobId());

            $this->task = new Task($coroutine, $this->context);
            $this->task->run();
        } catch (\Throwable $t) {
            $this->handleRequestException($response, t2ex($t));
        } catch (\Exception $e) {
            $this->handleRequestException($response, $e);
        }
    }

    private function handleRequestException($response, $e)
    {
        try {
            $repository = make(Repository::class);
            if ($repository->get("debug")) {
                echo_exception($e);
            }

            if ($this->request && $this->request->getServiceName()) {
                $this->reportHawk();
                $this->logErr($e);
            }

            $coroutine = static::handleException($this->middleWareManager, $response, $e);
            Task::execute($coroutine, $this->context);

            $this->event->fire($this->getRequestFinishJobId());
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }

    }

    /**
     * @param $middleware
     * @param Response $response
     * @param $t
     */
    public static function handleException($middleware, $response, $t)
    {
        try {
            $result = null;
            if ($middleware) {
                $result = (yield $middleware->handleException($t));
            }

            // 兼容PHP5
            if ($result && $result instanceof \Throwable || $result instanceof \Exception) {
                $response->sendException($result);
            } else {
                $response->sendException($t);
            }
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }
    }

    public function handleRequestFinish()
    {
        Timer::clearAfterJob($this->getRequestTimeoutJobId());
        $coroutine = $this->middleWareManager->executeTerminators($this->response);
        Task::execute($coroutine, $this->context);
    }

    public function handleTimeout()
    {
        try {
            $this->task->setStatus(Signal::TASK_KILLED);
            $this->reportHawk();
            $ex = $this->logTimeout();
            $coroutine = static::handleException($this->middleWareManager, $this->response, $ex);
            Task::execute($coroutine, $this->context);
            $this->event->fire($this->getRequestFinishJobId());
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }

    }

    private function getTraceIdInfo()
    {
        $trace = $this->task->getContext()->get("trace");
        if ($trace instanceof Trace) {
            return [
                "rootId" => $trace->getRootId(),
                "parentId" => $trace->getParentId(),
            ];
        }
        return null;
    }

    private function logTimeout()
    {
        $request = $this->request;

        if ($request->isGenericInvoke()) {
            $route = $request->getGenericRoute();
            $serviceName = $request->getGenericServiceName();
            $methodName = $request->getGenericMethodName();
        } else {
            $route = $request->getRoute();
            $serviceName = $request->getServiceName();
            $methodName = $request->getMethodName();
        }
        $remoteIp = long2ip($request->getRemoteIp());
        $remotePort = $request->getRemotePort();

        sys_error("SERVER TIMEOUT [remote=$remoteIp:$remotePort, route=$route]");

        $metaData = [
            "isGenericInvoke" => $request->isGenericInvoke(),
            "service"   => $serviceName,
            "method"    => $methodName,
            "args"      => $request->getArgs(),
            "remote"    => "$remoteIp:$remotePort",
            "trace"     => $this->getTraceIdInfo(),
        ];

        $ex = new ServerTimeoutException("SERVER TIMEOUT");
        $ex->setMetadata($metaData);
        $this->logErr($ex);

        return $ex;
    }

    private function getRequestFinishJobId()
    {
        return spl_object_hash($this) . '_request_finish';
    }

    private function getRequestTimeoutJobId()
    {
        return spl_object_hash($this) . '_handle_timeout';
    }

    private function reportHawk()
    {
        $hawk = Hawk::getInstance();
        $hawk->addTotalFailureTime(Hawk::SERVER,
            $this->request->getServiceName(),
            $this->request->getMethodName(),
            $this->request->getRemoteIp(),
            microtime(true) - $this->request->getStartTime());
        $hawk->addTotalFailureCount(Hawk::SERVER,
            $this->request->getServiceName(),
            $this->request->getMethodName(),
            $this->request->getRemoteIp());
    }

    private function logErr(\Exception $e)
    {
        $repository = make(Repository::class);
        $key = $repository->get('log.zan_framework');
        if ($key) {
            $coroutine = $this->doErrLog($e);
            Task::execute($coroutine);
        } else {
            echo_exception($e);
        }
    }

    private function doErrLog($e)
    {
        /** @var $e \Throwable|\Exception 兼容5&7 */
        try {
            $trace = $this->context->get('trace');

            if ($trace instanceof Trace) {
                $traceId = $trace->getRootId();
            } else {
                $traceId = '';
            }

            $application = make(Application::class);
            yield Log::make('zan_framework')->error($e->getMessage(), [
                'exception' => $e,
                'app' => $application->getName(),
                'language'=>'php',
                'side'=>'server',//server,client两个选项
                'traceId'=> $traceId,
                'method'=>$this->request->getServiceName() .'.'. $this->request->getMethodName(),
            ]);
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }
    }
}
