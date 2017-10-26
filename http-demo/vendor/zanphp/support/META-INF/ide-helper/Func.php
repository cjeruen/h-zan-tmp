<?php

namespace Zan\Framework\Utilities\Types;


class Func
{
    public static function toClosure(callable $func, $args=null, callable $validator=null)
    {
        \ZanPHP\Support\Func::toClosure($func, $args, $validator);
    }
    
    public static function call(callable $func, $args=null)
    {
        \ZanPHP\Support\Func::call($func, $args);
    }

}
