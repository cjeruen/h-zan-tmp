<?php

namespace ZanPHP\MqServer;

use swoole_http_server as SwooleServer;
use swoole_http_request as SwooleHttpRequest;
use swoole_http_response as SwooleHttpResponse;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\ServiceStore\ServiceStore;
use ZanPHP\HttpServer\RequestHandler;
use ZanPHP\MqServer\WorkerStart\InitializeMqSubscribe;
use ZanPHP\ServerBase\ServerBase;
use ZanPHP\ServerBase\ServerStart\InitLogConfig;
use ZanPHP\ServerBase\WorkerStart\InitializeConnectionPool;
use ZanPHP\ServerBase\WorkerStart\InitializeErrorHandler;
use ZanPHP\ServerBase\WorkerStart\InitializeHawkMonitor;
use ZanPHP\ServerBase\WorkerStart\InitializeServerDiscovery;
use ZanPHP\ServerBase\WorkerStart\InitializeServiceChain;
use ZanPHP\ServerBase\WorkerStart\InitializeWorkerMonitor;
use ZanPHP\TcpServer\ServerStart\InitializeSqlMap;

class Server extends ServerBase
{
    protected $serverStartItems = [
        InitializeSqlMap::class,
        InitLogConfig::class,
    ];

    protected $workerStartItems = [
        InitializeErrorHandler::class,
        InitializeHawkMonitor::class,
        InitializeConnectionPool::class,
        InitializeWorkerMonitor::class,
        InitializeServerDiscovery::class,
        InitializeServiceChain::class,
        InitializeMqSubscribe::class,
    ];

    public function setSwooleEvent()
    {
        $this->swooleServer->on('start', [$this, 'onStart']);
        $this->swooleServer->on('shutdown', [$this, 'onShutdown']);

        $this->swooleServer->on('workerStart', [$this, 'onWorkerStart']);
        $this->swooleServer->on('workerStop', [$this, 'onWorkerStop']);
        $this->swooleServer->on('workerError', [$this, 'onWorkerError']);

        $this->swooleServer->on('request', [$this, 'onRequest']);
    }

    protected function init()
    {
        $repository = make(Repository::class);
        $config = $repository->get('registry');
        if (!isset($config['app_names']) || [] === $config['app_names']) {
            return;
        }
        ServiceStore::getInstance()->resetLockDiscovery();
    }

    public function onStart($swooleServer)
    {
        $this->writePid($swooleServer->master_pid);
        sys_echo("server starting .....");
    }

    public function onShutdown($swooleServer)
    {
        $this->removePidFile();
        sys_echo("server shutdown .....");
    }

    public function onWorkerStart($swooleServer, $workerId)
    {
        $this->bootWorkerStartItem($workerId);
        sys_echo("worker *$workerId starting .....");
        (new MqSubscribe())->start();
        sys_echo("mq subscribe in worker *$workerId starting .....");
    }

    public function onWorkerStop($swooleServer, $workerId)
    {
        // ServerDiscoveryInitiator::getInstance()->unlockDiscovery($workerId);
        sys_echo("worker *$workerId stopping .....");
    }

    public function onWorkerError($swooleServer, $workerId, $workerPid, $exitCode, $sigNo)
    {
        // ServerDiscoveryInitiator::getInstance()->unlockDiscovery($workerId);
    }

    public function onRequest(SwooleHttpRequest $swooleHttpRequest, SwooleHttpResponse $swooleHttpResponse)
    {
        (new RequestHandler())->handle($swooleHttpRequest, $swooleHttpResponse);
    }
}
