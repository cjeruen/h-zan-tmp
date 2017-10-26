<?php

namespace Zan\Framework\Sdk\Monitor\Hawk;

class Hawk
{
    private $Hawk;

    public function __construct()
    {
        $this->Hawk = new \ZanPHP\Hawk\Hawk();
    }

    public function run($server)
    {
        $this->Hawk->run($server);
    }

    public function add($biz, array $metrics, array $tags = [])
    {
        $this->Hawk->add($biz, $metrics, $tags);
    }

    public function report()
    {
        $this->Hawk->report();
    }

    public function addServerServiceData($service, $method, $clientIp, $key, $val)
    {
        $this->Hawk->addServerServiceData($service, $method, $clientIp, $key, $val);
    }

    public function addClientServiceData($service, $method, $serverIp, $key, $val)
    {
        $this->Hawk->addClientServiceData($service, $method, $serverIp, $key, $val);
    }

    public function addTotalSuccessTime($side, $service, $method, $ip, $diffSec)
    {
        $this->Hawk->addTotalSuccessTime($side, $service, $method, $ip, $diffSec);
    }

    public function addTotalFailureTime($side, $service, $method, $ip, $diffSec)
    {
        $this->Hawk->addTotalFailureTime($side, $service, $method, $ip, $diffSec);
    }

    public function addTotalSuccessCount($side, $service, $method, $ip)
    {
        $this->Hawk->addTotalSuccessCount($side, $service, $method, $ip);
    }

    public function addTotalFailureCount($side, $service, $method, $ip)
    {
        $this->Hawk->addTotalFailureCount($side, $service, $method, $ip);
    }
}