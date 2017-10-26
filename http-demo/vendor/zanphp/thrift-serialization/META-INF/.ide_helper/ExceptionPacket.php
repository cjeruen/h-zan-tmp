<?php

namespace Kdt\Iron\Nova\Service;

class ExceptionPacket
{
    private $ExceptionPacket;

    public function __construct()
    {
        $this->ExceptionPacket = new \ZanPHP\ThriftSerialization\ExceptionPacket();
    }
    public function ironInject($e)
    {
        $this->ExceptionPacket->ironInject($e);
    }

}