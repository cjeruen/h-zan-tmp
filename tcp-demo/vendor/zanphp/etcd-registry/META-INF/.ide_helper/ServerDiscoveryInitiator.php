<?php

namespace Zan\Framework\Network\ServerManager;

class ServerDiscoveryInitiator
{
    private $ServerDiscoveryInitiator;

    public function __construct()
    {
        $this->ServerDiscoveryInitiator = new \ZanPHP\EtcdRegistry\ServerDiscoveryInitiator();
    }

    public function init($workerId)
    {
        $this->ServerDiscoveryInitiator->init($workerId);
    }

    public function unlockDiscovery($workerId)
    {
        $this->ServerDiscoveryInitiator->unlockDiscovery($workerId);
    }

    public function noNeedDiscovery($config)
    {
        $this->ServerDiscoveryInitiator->noNeedDiscovery($config);
    }
}