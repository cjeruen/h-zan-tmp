<?php

namespace Zan\Framework\Network\Http\Exception\Handler;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class PageNotFoundHandler implements ExceptionHandler
{
    private $PageNotFoundHandler;

    public function __construct()
    {
        $this->PageNotFoundHandler = new \ZanPHP\HttpFoundation\Exception\Handler\PageNotFoundHandler();
    }

    public function handle(\Exception $e)
    {
        $this->PageNotFoundHandler->handle($e);
    }
}
