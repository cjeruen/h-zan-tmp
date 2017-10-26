<?php

namespace Zan\Framework\Network\Http\Routing;

use ZanPHP\HttpFoundation\Request\Request;

class Router
{
    private $Router;

    public function __construct()
    {
        $this->Router = new \ZanPHP\Routing\Router();
    }

    public function init($config)
    {
        $this->Router->init($config);
    }

    public function route(Request $request)
    {
        $this->Router->route($request);
    }

    public function handleUri($uri)
    {
        $this->Router->handleUri($uri);
    }
}