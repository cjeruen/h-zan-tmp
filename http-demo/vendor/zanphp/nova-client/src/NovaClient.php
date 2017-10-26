<?php

namespace ZanPHP\NovaClient;

use ZanPHP\Contracts\ConnectionPool\Heartbeatable;
use ZanPHP\Contracts\Trace\Trace;
use ZanPHP\Coroutine\Context;
use ZanPHP\Contracts\ConnectionPool\Connection;
use ZanPHP\Contracts\Codec\Codec;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Debugger\Tracer;
use ZanPHP\Contracts\Hawk\Hawk;
use ZanPHP\Contracts\Trace\Constant;
use ZanPHP\Coroutine\Contract\Async;
use ZanPHP\Exception\Codec\CodecException;
use ZanPHP\Log\Log;
use ZanPHP\NovaCodec\NovaPDU;
use ZanPHP\NovaConnectionPool\NovaConnection;
use ZanPHP\RpcContext\RpcContext;
use ZanPHP\Support\Json;
use ZanPHP\Timer\Timer;
use Thrift\Exception\TApplicationException;
use Thrift\Type\TMessageType;
use ZanPHP\ThriftSerialization\Packer;


class NovaClient implements Async, Heartbeatable
{
    const DEFAULT_SEND_TIMEOUT = 3000;

    const MAX_NOVA_ATTACH_LEN = 30000;

    /**
     * @var NovaConnection
     */
    private $novaConnection;

    /**
     * @var \swoole_client
     */
    private $sock;

    private $serviceName;

    /**
     * @var ClientContext
     */
    private $currentContext;

    private static $reqMap = [];

    private static $instance = null;

    private static $sendTimeout;

    private static $seqTimerId = [];

    final public static function getInstance(Connection $conn, $serviceName)
    {
        $key = spl_object_hash($conn) . '_' . $serviceName;

        if (!isset(static::$instance[$key]) || null === static::$instance[$key]) {
            static::$instance[$key] = new static($conn, $serviceName);

            if (self::$sendTimeout === null) {
                /** @var Repository $repository */
                $repository = make(Repository::class);
                $defaultTimeout = $repository->get("connection.nova.send_timeout", static::DEFAULT_SEND_TIMEOUT);
                self::$sendTimeout = $defaultTimeout;
            }
        }

        return static::$instance[$key];
    }

    public function __construct(Connection $conn, $serviceName)
    {
        $this->serviceName = $serviceName;
        $this->novaConnection = $conn;
        $this->sock = $conn->getSocket();
        $this->novaConnection->setOnReceive([$this, "recv"]);
    }

    public function execute(callable $callback, $task)
    {
        $this->currentContext->setCb($callback);
        $this->currentContext->setTask($task);
    }

    /**
     * @param $method
     * @param $inputArguments
     * @param $outputStruct
     * @param $exceptionStruct
     * @return \Generator
     * @throws NetworkException
     * @throws ProtocolException
     */
    public function call($method, $inputArguments, $outputStruct, $exceptionStruct, $timeout = null)
    {
        /** @var int $seq */
        $seq = nova_get_sequence();

        $packer = Packer::newInstance();

        /** @var Hawk $hawk */
        $hawk = make(Hawk::class);

        $trace = (yield getContext('trace'));

        $debuggerTrace = (yield getContext("debugger_trace"));
        $debuggerTid = null;

        $attachment = (yield getRpcContext(null, []));


        $context = new ClientContext();
        $context->setOutputStruct($outputStruct);
        $context->setExceptionStruct($exceptionStruct);
        $context->setReqServiceName($this->serviceName);
        $context->setReqMethodName($method);
        $context->setReqSeqNo($seq);
        $context->setPacker($packer);
        $context->setStartTime();
        $this->currentContext = $context;

        $thriftBin = $packer->encode(TMessageType::CALL, $method, $inputArguments, Packer::CLIENT);

        $sockInfo = $this->sock->getsockname();
        $localIp = ip2long($sockInfo['host']);
        $localPort = $sockInfo['port'];


        if ($trace instanceof Trace) {
            $traceHandle = $trace->transactionBegin(Constant::NOVA_CLIENT, $this->serviceName . '.' . $method);
            $context->setTraceHandle($traceHandle);
            $msgId =  $trace->generateId();
            $trace->logEvent(Constant::REMOTE_CALL, Constant::SUCCESS, "", $msgId);
            $trace->setRemoteCallMsgId($msgId);
            if ($trace->getRootId()) {
                $attachment[Trace::TRACE_KEY]['rootId'] = $attachment[Trace::TRACE_KEY][Trace::ROOT_ID_KEY] = $trace->getRootId();
            }
            if ($trace->getParentId()) {
                $attachment[Trace::TRACE_KEY]['parentId'] = $attachment[Trace::TRACE_KEY][Trace::PARENT_ID_KEY] = $trace->getParentId();
            }
            $attachment[Trace::TRACE_KEY]['eventId'] = $attachment[Trace::TRACE_KEY][Trace::CHILD_ID_KEY] = $msgId;
        }

        if ($debuggerTrace instanceof Tracer) {
            $name = $this->serviceName . '.' . $method;
            $debuggerTid = $debuggerTrace->beginTransaction(Constant::NOVA_CLIENT, $name, $inputArguments);
            $context->setDebuggerTraceTid($debuggerTid);
            $attachment[Tracer::KEY] = $debuggerTrace->getKey();
        }

        if (empty($attachment)) {
            $attachment = new \stdClass();
        } else {
            $attachment[Trace::TRACE_KEY] = json_encode($attachment[Trace::TRACE_KEY]);
        }

        $attachmentContent = json_encode($attachment);
        if (strlen($attachmentContent) >= self::MAX_NOVA_ATTACH_LEN) {
            $attachmentContent = '{"error":"len of attach overflow"}';
        }
        $context->setAttachmentContent($attachmentContent);


        /** @var Codec $codec */
        $codec = make("codec:nova");
        $pdu = new NovaPDU();
        $pdu->serviceName = $this->serviceName;
        $pdu->methodName = $method;
        $pdu->ip = $localIp;
        $pdu->port = $localPort;
        $pdu->seqNo = $seq;
        $pdu->attach = $attachmentContent;
        $pdu->body = $thriftBin;

        try {
            $sendBuffer = $codec->encode($pdu);
            $this->novaConnection->setLastUsedTime();
            $sent = $this->sock->send($sendBuffer);
            if (false === $sent) {
                $serverIp = $localIp . ':' . $localPort;
                $hawk->addTotalFailureTime(Hawk::CLIENT, $this->serviceName, $method, $serverIp, microtime(true) - $context->getStartTime());
                $hawk->addTotalFailureCount(Hawk::CLIENT, $this->serviceName, $method, $serverIp);
                $exception = new NetworkException(socket_strerror($this->sock->errCode), $this->sock->errCode);
                goto handle_exception;
            }

            self::$reqMap[$seq] = $context;
            if ($timeout == null) {
                $timeout = self::$sendTimeout;
            }
            $peer = $this->novaConnection->getConfig();
            self::$seqTimerId[$seq] = Timer::after($timeout, function() use($trace, $debuggerTrace, $debuggerTid, $seq, $peer, $localIp, $localPort) {
                if ($debuggerTrace instanceof Tracer) {
                    $debuggerTrace->commit($debuggerTid, "warn", "timeout");
                }

                /** @var ClientContext $context */
                $context = self::$reqMap[$seq];
                unset(self::$reqMap[$seq]);
                unset(self::$seqTimerId[$seq]);
                $cb = $context->getCb();
                $serviceName = $context->getReqServiceName();
                $methodName = $context->getReqMethodName();

                $localIp = long2ip($localIp);
                $exception = new NetworkException("nova recv timeout, serviceName = $serviceName, methodName = $methodName,
                        local client = $localIp/$localPort, peer server = {$peer['host']}/{$peer['port']}");
                if ($trace instanceof Trace) {
                    $trace->commit($context->getTraceHandle(), $exception);
                }
                call_user_func($cb, null, $exception);
            });

            yield $this;
            return;
        } catch (CodecException $e) {
            $serverIp = $localIp . ':' . $localPort;
            $hawk->addTotalFailureTime(Hawk::CLIENT, $this->serviceName, $method, $serverIp, microtime(true) - $context->getStartTime());
            $hawk->addTotalFailureCount(Hawk::CLIENT, $this->serviceName, $method, $serverIp);
            $exception = new ProtocolException('nova.encoding.failed');
            goto handle_exception;
        }


        handle_exception:
        $traceId = '';
        if ($trace instanceof Trace) {
            $trace->commit($context->getTraceHandle(), $exception);
            $traceId = $trace->getRootId();
        }
        if ($debuggerTrace instanceof Tracer) {
            $debuggerTrace->commit($debuggerTid, "error", $exception);
        }

        if (make(Repository::class)->get('log.zan_framework')) {
            yield Log::make('zan_framework')->error($exception->getMessage(), [
                'exception' => $exception,
                'app' => getenv("appname"),
                'language'=>'php',
                'side'=>'client',//server,client两个选项
                'traceId'=> $traceId,
                'method'=>$this->serviceName.'.'.$method,
            ]);
        }

        throw $exception;
    }

    /**
     * @param $data
     * @throws NetworkException
     */
    public function recv($data) 
    {
        $exception = null;
        $trace = null;
        $debuggerTrace = null;

        if (false === $data or '' == $data) {
            $exception = new NetworkException(socket_strerror($this->sock->errCode), $this->sock->errCode);
            goto handle_exception;
        }


        try {
            /** @var Codec $codec */
            $codec = make("codec:nova");
            $pdu = $codec->decode($data);
            if (!$pdu instanceof NovaPDU) {
                return;
            }

            if (isset(self::$seqTimerId[$pdu->seqNo])) {
                Timer::clearAfterJob(self::$seqTimerId[$pdu->seqNo]);
                unset(self::$seqTimerId[$pdu->seqNo]);
            }


            /** @var ClientContext $context */
            $context = isset(self::$reqMap[$pdu->seqNo]) ? self::$reqMap[$pdu->seqNo] : null;
            if (!$context) {
                $attach = Json::decode($pdu->attach);
                if (isset($attach[RpcContext::TRACE_KEY])) {
                    $trace = "trace = ".Json::encode($pdu->attach);
                } else {
                    $trace = "";
                }
                sys_echo("The timeout response finally returned, serviceName = {$pdu->serviceName}, method = {$pdu->methodName} ".$trace);
                return;
            }
            unset(self::$reqMap[$pdu->seqNo]);

            /* @var $ctx Context */
            $ctx = $context->getTask()->getContext();

            /** @var Trace $trace */
            $trace = $ctx->get('trace');
            $debuggerTrace = $ctx->get('debugger_trace');

            $cb = $context->getCb();

            if ($pdu->serviceName === 'com.youzan.service.test' && $pdu->methodName === 'pong') {
                call_user_func($cb, true);
                return;
            }


            /* @var $packer Packer */
            $packer = $context->getPacker();

            /** @var Hawk $hawk */
            $hawk = make(Hawk::class);

            $serverIp = long2ip($pdu->ip) . ':' . $pdu->port;

            if ($pdu->serviceName != $context->getReqServiceName()
                || $pdu->methodName != $context->getReqMethodName()) {
                return;
            }

            try {
                $response = $packer->decode($pdu->body, $packer->struct($context->getOutputStruct(), $context->getExceptionStruct()), Packer::CLIENT);
            } catch (\Throwable $e) { }
            catch (\Exception $e) { }

            if (isset($e)) {
                if ($trace instanceof Trace) {
                    if ($e instanceof TApplicationException) {
                        //只有系统异常上报异常信息
                        $hawk->addTotalFailureTime(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp, microtime(true) - $context->getStartTime());
                        $hawk->addTotalFailureCount(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp);
                        $trace->commit($context->getTraceHandle(), $e->getTraceAsString());
                    } else {
                        $hawk->addTotalSuccessTime(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp, microtime(true) - $context->getStartTime());
                        $hawk->addTotalSuccessCount(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp);
                        $trace->commit($context->getTraceHandle(), Constant::SUCCESS);
                    }
                }
                if ($debuggerTrace instanceof Tracer) {
                    $debuggerTrace->commit($context->getDebuggerTraceTid(), "error", $e);
                }
                call_user_func($cb, null, $e);
                return;
            }

            $hawk->addTotalSuccessTime(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp, microtime(true) - $context->getStartTime());
            $hawk->addTotalSuccessCount(Hawk::CLIENT, $pdu->serviceName, $pdu->methodName, $serverIp);
            $ret = isset($response[$packer->successKey]) ? $response[$packer->successKey] : null;

            if ($trace instanceof Trace) {
                $trace->commit($context->getTraceHandle(), Constant::SUCCESS);
            }
            if ($debuggerTrace instanceof Tracer) {
                $debuggerTrace->commit($context->getDebuggerTraceTid(), "info", $ret);
            }

            call_user_func($cb, $ret);
            return;

        } catch (CodecException $e) {
            $exception = new ProtocolException('nova.decoding.failed ~[client:'.strlen($data).']');
            goto handle_exception;
        }


handle_exception:
        foreach (self::$reqMap as $req) {
            if (null !== $trace) {
                $trace = $req->getTask()->getContext()->get('trace');
                $trace->commit($req->getTraceHandle(), socket_strerror($this->sock->errCode));
            }
            $req->getTask()->sendException($exception);
        }

        $this->novaConnection->close();
    }

    public function ping()
    {
        /** @var int $seq */
        $seq = nova_get_sequence();

        $method = 'ping';

        $context = new ClientContext();
        $context->setReqServiceName($this->serviceName);
        $context->setReqMethodName($method);
        $context->setReqSeqNo($seq);

        $this->currentContext = $context;

        $sockInfo = $this->sock->getsockname();
        $localIp = ip2long($sockInfo['host']);
        $localPort = $sockInfo['port'];

        /** @var Codec $codec */
        $codec = make("codec:nova");

        $pdu = new NovaPDU();
        $pdu->serviceName = $this->serviceName;
        $pdu->methodName = $method;
        $pdu->ip = $localIp;
        $pdu->port = $localPort;
        $pdu->seqNo = $seq;
        $pdu->attach = "";
        $pdu->body = "";


        try {
            $sendBuffer = $codec->encode($pdu);
            $this->novaConnection->setLastUsedTime();

            $sent = $this->sock->send($sendBuffer);
            if (false === $sent) {
                throw new NetworkException(socket_strerror($this->sock->errCode), $this->sock->errCode);
            }

            self::$reqMap[$seq] = $context;

            Timer::after(self::$sendTimeout, function() use($seq) {
                unset(self::$reqMap[$seq]);
            });

            yield $this;
        } catch (CodecException $e) {
            echo_exception($e);
        }
    }
}