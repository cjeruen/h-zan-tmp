<?php

namespace Zan\Framework\Network\ServerManager;

class ServerStore
{
    private $ServerStore;

    public function __construct()
    {
        $this->ServerStore = new \ZanPHP\ServiceStore\ServiceStore();
    }

    public function getServiceWaitIndex($appName)
    {
        $this->ServerStore->getServiceWaitIndex($appName);
    }

    public function setServiceWaitIndex($appName, $waitIndex)
    {
        $this->ServerStore->setServiceWaitIndex($appName, $waitIndex);
    }

    public function getServices($appName)
    {
        $this->ServerStore->getServices($appName);
    }

    public function setServices($appName, $servers)
    {
        $this->ServerStore->setServices($appName, $servers);
    }

    public function getDoWatchLastTime($appName)
    {
        $this->ServerStore->getDoWatchLastTime($appName);
    }

    public function setDoWatchLastTime($appName)
    {
        $this->ServerStore->setDoWatchLastTime($appName);
    }

    public function resetLockDiscovery()
    {
        $this->ServerStore->resetLockDiscovery();
    }

}