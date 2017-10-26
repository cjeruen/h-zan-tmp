<?php

namespace Zan\Framework\Network\Http\Routing;

class RouteInitiator
{
    private $RouteInitiator;

    public function __construct()
    {
        $this->RouteInitiator = new \ZanPHP\Routing\RouteInitiator();
    }

    public function init(array $config)
    {
        $this->RouteInitiator->init($config);
    }
} 