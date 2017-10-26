<?php

namespace Zan\Framework\Network\Http\Exception\Handler;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class ServerUnavailableHandler implements ExceptionHandler
{
    private $ServerUnavailableHandler;

    public function __construct()
    {
        $this->ServerUnavailableHandler = new \ZanPHP\HttpFoundation\Exception\Handler\ServerUnavailableHandler();
    }

    public function handle(\Exception $e)
    {
        $this->ServerUnavailableHandler->handle($e);
    }
}
