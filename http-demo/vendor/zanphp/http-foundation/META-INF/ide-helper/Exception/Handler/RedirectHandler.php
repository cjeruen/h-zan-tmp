<?php

namespace Zan\Framework\Network\Http\Exception\Handler;

use ZanPHP\Contracts\Foundation\ExceptionHandler;

class RedirectHandler implements ExceptionHandler
{
    private $RedirectHandler;

    public function __construct()
    {
        $this->RedirectHandler = new \ZanPHP\HttpFoundation\Exception\Handler\RedirectHandler();
    }

    public function handle(\Exception $e)
    {
        $this->RedirectHandler->handle($e);
    }
}
