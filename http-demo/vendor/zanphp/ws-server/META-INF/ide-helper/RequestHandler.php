<?php
namespace Zan\Framework\Network\WebSocket;

use \swoole_websocket_server as SwooleWebSocketServer;
use ZanPHP\ServerBase\Middleware\MiddlewareManager;

class RequestHandler {

    private $RequestHandler;

    public function __construct()
    {
        $this->RequestHandler = new \ZanPHP\WSServer\RequestHandler();
    }

    public function handle(SwooleWebSocketServer $swooleWebSocketServer, $frame)
    {
        $this->RequestHandler->handle($swooleWebSocketServer, $frame);
    }

    public static function handleException(MiddlewareManager $middleware, \Exception $e)
    {
        \ZanPHP\WSServer\RequestHandler::handleException($middleware, $e);
    }

    public function handleRequestFinish()
    {
        $this->RequestHandler->handleRequestFinish();
    }

    public function handleTimeout()
    {
        $this->RequestHandler->handleTimeout();
    }
}