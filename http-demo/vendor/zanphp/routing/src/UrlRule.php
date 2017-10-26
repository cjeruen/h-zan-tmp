<?php

namespace ZanPHP\Routing;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Support\Arr;
use ZanPHP\Support\Dir;
use ZanPHP\Support\Singleton;

class UrlRule
{

    use Singleton;

    private static $rules = [];

    public static function loadRules()
    {
        $repository = make(Repository::class);
        $path = $repository->get('path.routing');
        if (!is_dir($path))
            return false;
        $routeFiles = Dir::glob($path, '*.routing.php');

        if (!$routeFiles) return false;

        foreach ($routeFiles as $file)
        {
            $route = include $file;
            if (!is_array($route)) continue;
            self::$rules = Arr::merge(self::$rules, $route);
        }
    }

    public static function getRules()
    {
        return self::$rules;
    }
}