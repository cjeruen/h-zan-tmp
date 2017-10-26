<?php

namespace Zan\Framework\Network\Common;

use ZanPHP\Coroutine\Contract\Async;

class DnsClient implements Async
{
    private $DnsClient;

    public function __construct()
    {
        $this->DnsClient = new \ZanPHP\DnsClient\DnsClient();
    }

    public static function lookup($host, $callback = null, $timeoutFn = null, $timeout = 100)
    {
        \ZanPHP\DnsClient\DnsClient::lookup($host, $callback, $timeoutFn, $timeout);
    }

    public static function lookupWithoutTimeout($host, $callback)
    {
        \ZanPHP\DnsClient\DnsClient::lookupWithoutTimeout($host, $callback);
    }

    public function resolve()
    {
        $this->DnsClient->resolve();
    }

    public function onTimeout($duration)
    {
        $this->DnsClient->onTimeout($duration);
    }

    public function execute(callable $callback, $task)
    {
        $this->DnsClient->execute($callback, $task);
    }

    public function query($host, $timeout = 100)
    {
        $this->DnsClient->query($host, $timeout);
    }
}