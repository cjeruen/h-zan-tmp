<?php

namespace Zan\Framework\Network\ServerManager;

class ServiceUnregister
{
    private $ServiceUnregister;

    public function __construct()
    {
        $this->ServiceUnregister = new \ZanPHP\EtcdRegistry\ServiceUnregister();
    }

    public function unRegister()
    {
        $this->ServiceUnregister->unRegister();
    }

}