<?php

namespace Zan\Framework\Network\ServerManager;

class ServerRegisterInitiator
{
    private $ServerRegisterInitiator;

    public function __construct()
    {
        $this->ServerRegisterInitiator = new \ZanPHP\EtcdRegistry\ServerRegisterInitiator();
    }

    public function enableRegister()
    {
        $this->ServerRegisterInitiator->enableRegister();
    }

    public function disableRegister()
    {
        $this->ServerRegisterInitiator->disableRegister();
    }

    public function getRegister()
    {
        $this->ServerRegisterInitiator->getRegister();
    }

    public function init()
    {
        $this->ServerRegisterInitiator->init();
    }

    public function createRegisterConfigs()
    {
        $this->ServerRegisterInitiator->createRegisterConfigs();
    }
}