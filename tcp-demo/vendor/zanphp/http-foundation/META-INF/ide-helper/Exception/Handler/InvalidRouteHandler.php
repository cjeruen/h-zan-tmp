<?php

namespace Zan\Framework\Network\Http\Exception\Handler;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class InvalidRouteHandler implements ExceptionHandler
{
    private $InvalidRouteHandler;

    public function __construct()
    {
        $this->InvalidRouteHandler = new \ZanPHP\HttpFoundation\Exception\Handler\InvalidRouteHandler();
    }

    public function handle(\Exception $e)
    {
        $this->InvalidRouteHandler->handle($e);
    }
}
