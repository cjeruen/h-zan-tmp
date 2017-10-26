<?php

namespace Zan\Framework\Network\Http\Exception\Handler;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class InternalErrorHandler implements ExceptionHandler
{
    private $InternalErrorHandler;

    public function __construct()
    {
        $this->InternalErrorHandler = new \ZanPHP\HttpFoundation\Exception\Handler\InternalErrorHandler();
    }

    public function handle(\Exception $e)
    {
        $this->InternalErrorHandler->handle($e);
    }
}
