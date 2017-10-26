<?php

namespace Zan\Framework\Utilities\Types;

class Dir
{
    public static function glob($path, $pattern=null, $strategy)
    {
        \ZanPHP\Support\Dir::glob($path, $pattern, $strategy);
    }

    public static function scan($path, $strategy, $excludeDir=true)
    {
        \ZanPHP\Support\Dir::scan($path, $strategy, $excludeDir);
    }

    public static function formatPath($path)
    {
        \ZanPHP\Support\Dir::formatPath($path);
    }

    public static function matchPattern($pattern, $file)
    {
        \ZanPHP\Support\Dir::matchPattern($pattern, $file);
    }

    public static function basename($pathes, $suffix='')
    {
        \ZanPHP\Support\Dir::basename($pathes, $suffix);
    }
}