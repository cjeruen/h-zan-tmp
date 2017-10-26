<?php

namespace Zan\Framework\Network\Http\Routing;

class UrlRegex
{
    public static function formatRules($rules = [])
    {
        \ZanPHP\Routing\UrlRegex::formatRules($rules);
    }

    public static function decode($url, $rules = [])
    {
        \ZanPHP\Routing\UrlRegex::decode($url, $rules);
    }

}
