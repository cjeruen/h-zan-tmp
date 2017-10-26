<?php
namespace Zan\Framework\Network\WebSocket;

use ZanPHP\Coroutine\Context;
use ZanPHP\ServerBase\Middleware\MiddlewareManager;

class RequestTask
{
    private $RequestTask;

    public function __construct(Request $request, Context $context, MiddlewareManager $middlewareManager)
    {
        $this->RequestTask = new \ZanPHP\WSServer\RequestTask($request, $context, $middlewareManager);
    }

    public function run()
    {
        $this->RequestTask->run();
    }

    public function doRun()
    {
        $this->RequestTask->doRun();
    }
}
