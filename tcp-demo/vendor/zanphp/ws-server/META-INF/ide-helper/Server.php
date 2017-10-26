<?php
namespace Zan\Framework\Network\WebSocket;

use ZanPHP\HttpServer\Server as HttpServer;

class Server extends HttpServer
{
    private $Server;

    public function __construct()
    {
        $this->Server = new \ZanPHP\WSServer\Server();
    }

    public function setSwooleEvent()
    {
        $this->Server->setSwooleEvent();
    }

    public function onOpen($ws, $request)
    {
        $this->Server->onOpen($ws, $request);
    }

    public function OnMessage($ws, $frame)
    {
        $this->Server->OnMessage($ws, $frame);
    }

    public function OnClose($ws, $fd)
    {
        $this->Server->OnClose($ws, $fd);
    }

    public function setOpenCallback(callable $openCallback)
    {
        $this->Server->setOpenCallback($openCallback);
    }

    public function setCloseCallback(callable $closeCallback)
    {
        $this->Server->setCloseCallback($closeCallback);
    }

}