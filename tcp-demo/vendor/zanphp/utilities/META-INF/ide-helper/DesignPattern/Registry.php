<?php

namespace Zan\Framework\Utilities\DesignPattern;

class Registry
{
    public static function get($key, $default=null)
    {
        \ZanPHP\Utilities\DesignPattern\Registry::get($key, $default);
    }

    public static function set($key, $value)
    {
        \ZanPHP\Utilities\DesignPattern\Registry::set($key, $value);
    }

    public static function contain($key)
    {
        \ZanPHP\Utilities\DesignPattern\Registry::contain($key);
    }
}