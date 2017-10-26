<?php

namespace Zan\Framework\Network\ServerManager;


class ServerDiscovery
{
    private $ServerDiscovery;

    public function __construct($config, $appName, $protocol, $namespace)
    {
        $this->ServerDiscovery = new \ZanPHP\EtcdRegistry\ServerDiscovery($config, $appName, $protocol, $namespace);
    }

    public function workByEtcd()
    {
        $this->ServerDiscovery->workByEtcd();
    }

    public function workByStore()
    {
        $this->ServerDiscovery->workByStore();
    }

    public function discoverByEtcdTask()
    {
        $this->ServerDiscovery->discoverByEtcdTask();
    }

    public function discoverByStore()
    {
        $this->ServerDiscovery->discoverByStore();
    }

    public function watchByEtcdTask()
    {
        $this->ServerDiscovery->watchByEtcdTask();
    }

    public function checkWatchingByEtcd()
    {
        $this->ServerDiscovery->checkWatchingByEtcd();
    }

    public function watchByStore()
    {
        $this->ServerDiscovery->watchByStore();
    }

    public function watchByStoreTask()
    {
        $this->ServerDiscovery->watchByStoreTask();
    }

}