<?php

namespace Zan\Framework\Network\Http\Routing;

class UrlRule
{
    public static function loadRules()
    {
        \ZanPHP\Routing\UrlRule::loadRules();
    }

    public static function getRules()
    {
        \ZanPHP\Routing\UrlRule::getRules();
    }
}