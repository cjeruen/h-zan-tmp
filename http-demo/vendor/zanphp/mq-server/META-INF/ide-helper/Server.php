<?php

namespace Zan\Framework\Network\MqSubscribe;

use swoole_http_request as SwooleHttpRequest;
use swoole_http_response as SwooleHttpResponse;
use ZanPHP\ServerBase\ServerBase;


class Server extends ServerBase
{
    private $Server;

    public function __construct()
    {
        $this->Server = new \ZanPHP\MqServer\Server();
    }

    public function setSwooleEvent()
    {
        $this->Server->setSwooleEvent();
    }

    protected function init()
    {
        $this->Server->init();
    }

    public function onStart($swooleServer)
    {
        $this->Server->onStart($swooleServer);
    }

    public function onShutdown($swooleServer)
    {
        $this->Server->onShutdown($swooleServer);
    }

    public function onWorkerStart($swooleServer, $workerId)
    {
        $this->Server->onWorkerStart($swooleServer, $workerId);
    }

    public function onWorkerStop($swooleServer, $workerId)
    {
        $this->Server->onWorkerStop($swooleServer, $workerId);
    }

    public function onWorkerError($swooleServer, $workerId, $workerPid, $exitCode, $sigNo)
    {
        $this->Server->onWorkerError($swooleServer, $workerId, $workerPid, $exitCode, $sigNo);
    }

    public function onRequest(SwooleHttpRequest $swooleHttpRequest, SwooleHttpResponse $swooleHttpResponse)
    {
        $this->Server->onRequest($swooleHttpRequest, $swooleHttpResponse);
    }
}
