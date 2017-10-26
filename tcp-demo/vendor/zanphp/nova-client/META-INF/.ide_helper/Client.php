<?php

namespace Kdt\Iron\Nova\Network;

use ZanPHP\Contracts\ConnectionPool\Connection;
use ZanPHP\Coroutine\Contract\Async;

class Client implements Async
{
    private $Client;

    public function __construct(Connection $conn, $serviceName)
    {
        $this->Client = new \ZanPHP\NovaClient\NovaClient($conn, $serviceName);
    }

    final public static function getInstance(Connection $conn, $serviceName)
    {
        \ZanPHP\NovaClient\NovaClient::getInstance($conn, $serviceName);
    }

    public function execute(callable $callback, $task)
    {
        $this->Client->execute($callback, $task);
    }

    public function recv($data) 
    {
        $this->Client->recv($data);
    }

    public function call($method, $inputArguments, $outputStruct, $exceptionStruct)
    {
        $this->Client->call($method, $inputArguments, $outputStruct, $exceptionStruct);
    }

    public function ping()
    {
        $this->Client->ping();
    }
}