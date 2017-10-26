<?php

namespace Zan\Framework\Network\ServerManager;

class ServerRegister
{
    private $ServerRegister;

    public function __construct()
    {
        $this->ServerRegister = new \ZanPHP\EtcdRegistry\ServerRegister();
    }

    public static function createEtcdV2KV($config, $status = ServerDiscovery::SRV_STATUS_OK)
    {
        \ZanPHP\EtcdRegistry\ServerRegister::createEtcdV2KV($config, $status);
    }

    public static function getRandEtcdNode()
    {
        \ZanPHP\EtcdRegistry\ServerRegister::getRandEtcdNode();
    }

    public static function createHauntBody($config, $status = ServerDiscovery::SRV_STATUS_OK)
    {
        \ZanPHP\EtcdRegistry\ServerRegister::createHauntBody($config, $status);
    }

    public function register($config)
    {
        $this->ServerRegister->register($config);
    }

    public function refreshingEtcdV2TTL($config)
    {
        $this->ServerRegister->refreshingEtcdV2TTL($config);
    }
}