<?php

namespace Zan\Framework\Network\Server\Timer;

class Timer
{
    public static function tick($interval, Callable $callback, $jobId='')
    {
        \ZanPHP\Timer\Timer::tick($interval, $callback, $jobId);
    }

    public static function after($interval, Callable $callback, $jobId='')
    {
        \ZanPHP\Timer\Timer::after($interval, $callback, $jobId);
    }

    public static function clearTickJob($jobId)
    {
        \ZanPHP\Timer\Timer::clearTickJob($jobId);
    }

    public static function clearAfterJob($jobId)
    {
        \ZanPHP\Timer\Timer::clearAfterJob($jobId);
    }

    public static function clearTickMap($key)
    {
        \ZanPHP\Timer\Timer::clearTickMap($key);
    }

    public static function clearAfterMap($key)
    {
        \ZanPHP\Timer\Timer::clearAfterMap($key);
    }
}