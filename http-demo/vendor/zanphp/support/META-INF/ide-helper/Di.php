<?php

namespace Zan\Framework\Foundation\Container;

class Di
{
    public static function resolveFacadeInstance(Container $instance)
    {
        \ZanPHP\Support\Di::resolveFacadeInstance($instance);
    }

    public static function make($abstract, array $parameters = [], $shared = false)
    {
        \ZanPHP\Support\Di::make($abstract, $parameters, $shared);
    }
    
    public static function addStub($stub)
    {
        \ZanPHP\Support\Di::addStub($stub);
    }

    public static function cleanStub()
    {
        \ZanPHP\Support\Di::cleanStub();
    }

    public static function __callStatic($method, $args)
    {
        \ZanPHP\Support\Di::__callStatic($method, $args);
    }
}