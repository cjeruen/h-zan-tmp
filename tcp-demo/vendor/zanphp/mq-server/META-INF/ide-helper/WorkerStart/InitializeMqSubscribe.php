<?php

namespace Zan\Framework\Network\MqSubscribe\WorkerStart;

class InitializeMqSubscribe
{
    private $InitializeMqSubscribe;

    public function __construct()
    {
        $this->InitializeMqSubscribe = new \ZanPHP\MqServer\WorkerStart\InitializeMqSubscribe();
    }

    public function bootstrap($server)
    {
        $this->InitializeMqSubscribe->bootstrap($server);
    }
} 