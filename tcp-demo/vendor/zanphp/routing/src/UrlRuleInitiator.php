<?php

namespace ZanPHP\Routing;

use ZanPHP\Support\Singleton;

class UrlRuleInitiator
{
    use Singleton;

    public function init()
    {
        UrlRule::getInstance()->loadRules();
    }
} 