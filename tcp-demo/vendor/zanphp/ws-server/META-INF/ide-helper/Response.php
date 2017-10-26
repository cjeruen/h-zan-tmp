<?php
namespace Zan\Framework\Network\WebSocket;

use ZanPHP\Contracts\Network\Response as BaseResponse;
use \swoole_websocket_server as SwooleWebSocketServer;

class Response implements BaseResponse
{
    private $Response;

    public function __construct(SwooleWebSocketServer $swooleWebSocketServer, $fd)
    {
        $this->Response = new \ZanPHP\WSServer\Response($swooleWebSocketServer, $fd);
    }

    public function fail($code, $data = null)
    {
        $this->Response->fail($code, $data);
    }

    public function success($data)
    {
        $this->Response->success($data);
    }

    public function send($fd, $code, $data)
    {
        $this->Response->send($fd, $code, $data);
    }
}
