<?php

namespace ZanPHP\Routing;

use ZanPHP\Support\Singleton;

class RouteInitiator
{
    use Singleton;

    public function init(array $config)
    {
        Router::getInstance()->init($config);
    }
} 