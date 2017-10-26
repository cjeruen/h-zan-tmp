<?php

namespace Zan\Framework\Utilities\Types;

class Time
{

    public static function current($format=false)
    {
        \ZanPHP\Support\Time::current($format);
    }

    public static function stamp()
    {
        \ZanPHP\Support\Time::stamp();
    }

    public static function future($seconds,$format=false)
    {
        \ZanPHP\Support\Time::future($seconds,$format);
    }

    public static function past($seconds,$format=false)
    {
        \ZanPHP\Support\Time::past($seconds,$format);
    }

    public static function phpDiff($t1, $t2 = false, $format = '%y-%m-%d %h:%i:%s', $sign=false)
    {
        \ZanPHP\Support\Time::phpDiff($t1, $t2, $format, $sign);
    }

    public static function diff($t1, $t2 = false, $format = 'a', $sign = false)
    {
        \ZanPHP\Support\Time::diff($t1, $t2, $format, $sign);
    }
}