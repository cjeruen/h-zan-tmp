<?php
namespace Zan\Framework\Network\WebSocket;

use ZanPHP\Contracts\WebSocket\WebSocketRequest;

class Request implements WebSocketRequest
{
    private $Request;

    public function __construct($fd, $opcode, $path, $data)
    {
        $this->Request = new \ZanPHP\WSServer\Request($fd, $opcode, $path, $data);
    }

    public function getFd()
    {
        $this->Request->getFd();
    }

    public function getRoute()
    {
        $this->Request->getRoute();
    }

    public function getOpcode()
    {
        $this->Request->getOpcode();
    }

    public function getStartTime()
    {
        $this->Request->getStartTime();
    }

    public function setStartTime()
    {
        $this->Request->setStartTime();
    }

    public function getData()
    {
        $this->Request->getData();
    }

    public function getPath()
    {
        $this->Request->getPath();
    }
}