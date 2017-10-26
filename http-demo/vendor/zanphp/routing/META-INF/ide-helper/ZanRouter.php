<?php

namespace Zan\Framework\Network\Http\Routing;

use ZanPHP\HttpFoundation\Request\Request;
use ZanPHP\Routing\IRouter;

class ZanRouter implements IRouter
{
    private $ZanRouter;

    public function __construct()
    {
        $this->ZanRouter = new \ZanPHP\Routing\ZanRouter();
    }

    public function dispatch(Request $request)
    {
        $this->ZanRouter->dispatch($request);
    }
}