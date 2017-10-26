<?php

namespace ZanPHP\TcpServer;

use Thrift\Exception\TApplicationException;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Foundation\Application;
use ZanPHP\Contracts\Hawk\Hawk;
use ZanPHP\Contracts\Trace\Constant;
use ZanPHP\Contracts\Trace\Trace;
use ZanPHP\Coroutine\Context;
use ZanPHP\Coroutine\Task;
use ZanPHP\Log\Log;
use ZanPHP\NovaGeneric\GenericInvokeException;
use ZanPHP\ServerBase\Middleware\MiddlewareManager;

class RequestTask
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Context
     */
    private $context;
    private $middleWareManager;


    public function __construct(Request $request, Response $response, Context $context, MiddlewareManager $middlewareManager)
    {
        $this->request = $request;
        $this->response = $response;
        $this->context = $context;
        $this->middleWareManager = $middlewareManager;
    }

    public function run()
    {
        try {
            yield $this->doRun();
        } catch (\Throwable $t) {
            $this->handleRequestException(t2ex($t));
        } catch (\Exception $e) {
            $this->handleRequestException($e);
        }
    }

    private function handleRequestException($e)
    {
        $hawk = make(Hawk::class);
        if ($e instanceof TApplicationException) {
            $hawk->addTotalFailureTime(Hawk::SERVER,
                $this->request->getServiceName(),
                $this->request->getMethodName(),
                $this->request->getRemoteIp(),
                microtime(true) - $this->request->getStartTime());
            $hawk->addTotalFailureCount(Hawk::SERVER,
                $this->request->getServiceName(),
                $this->request->getMethodName(),
                $this->request->getRemoteIp());
            $this->logErr($e);
        } else {
            $hawk->addTotalSuccessTime(Hawk::SERVER,
                $this->request->getServiceName(),
                $this->request->getMethodName(),
                $this->request->getRemoteIp(),
                microtime(true) - $this->request->getStartTime());
            $hawk->addTotalSuccessCount(Hawk::SERVER,
                $this->request->getServiceName(),
                $this->request->getMethodName(),
                $this->request->getRemoteIp());
        }

        $coroutine = RequestHandler::handleException($this->middleWareManager, $this->response, $e);
        Task::execute($coroutine, $this->context);

        $this->context->getEvent()->fire($this->context->get('request_end_event_name'));
    }
    
    private function doRun()
    {
        $response = (yield $this->middleWareManager->executeFilters());
        if(null !== $response){
            if ($response instanceof ResponseEntity) {
                $response = $response->getContent();
            }
            if ($this->request->isGenericInvoke()) {
                throw new GenericInvokeException(strval($response));
            } else {
                $this->output($response);
            }
            $this->context->getEvent()->fire($this->context->get('request_end_event_name'));
            return;
        }

        $dispatcher = new Dispatcher();
        $trace = $this->context->get('trace');
        $trace->logEvent(Constant::NOVA_PROCCESS, Constant::SUCCESS, 'dispatch');
        $result = (yield $dispatcher->dispatch($this->request, $this->context));
        $this->output($result);

        $hawk = make(Hawk::class);
        $hawk->addTotalSuccessTime(Hawk::SERVER,
            $this->request->getServiceName(),
            $this->request->getMethodName(),
            $this->request->getRemoteIp(),
            microtime(true) - $this->request->getStartTime());
        $hawk->addTotalSuccessCount(Hawk::SERVER,
            $this->request->getServiceName(),
            $this->request->getMethodName(),
            $this->request->getRemoteIp());

        $this->context->getEvent()->fire($this->context->get('request_end_event_name'));
    }

    private function output($execResult)
    {
        return $this->response->end($execResult);
    }

    private function logErr($e)
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