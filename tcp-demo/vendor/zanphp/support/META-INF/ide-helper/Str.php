<?php

namespace Zan\Framework\Utilities\Types;

class Str
{
    public static function ascii($value)
    {
        \ZanPHP\Support\Str::ascii($value);
    }

    public static function camel($value)
    {
        \ZanPHP\Support\Str::camel($value);
    }

    public static function contains($haystack, $needles)
    {
        \ZanPHP\Support\Str::contains($haystack, $needles);
    }

    public static function endsWith($haystack, $needles)
    {
        \ZanPHP\Support\Str::endsWith($haystack, $needles);
    }

    public static function finish($value, $cap)
    {
        \ZanPHP\Support\Str::finish($value, $cap)   ;
    }

    public static function is($pattern, $value)
    {
        \ZanPHP\Support\Str::is($pattern, $value);
    }

    public static function length($value)
    {
        \ZanPHP\Support\Str::length($value);
    }

    public static function limit($value, $limit = 100, $end = '...')
    {
        \ZanPHP\Support\Str::limit($value, $limit, $end);
    }

    public static function lower($value)
    {
        \ZanPHP\Support\Str::lower($value);
    }

    public static function words($value, $words = 100, $end = '...')
    {
        \ZanPHP\Support\Str::words($value, $words, $end);
    }

    public static function parseCallback($callback, $default)
    {
        \ZanPHP\Support\Str::parseCallback($callback, $default);
    }

    public static function random($length = 16)
    {
        \ZanPHP\Support\Str::random($length);
    }

    public static function randomBytes($length = 16)
    {
        \ZanPHP\Support\Str::randomBytes($length);
    }

    public static function quickRandom($length = 16)
    {
        \ZanPHP\Support\Str::quickRandom($length);
    }

    public static function equals($knownString, $userInput)
    {
        \ZanPHP\Support\Str::equals($knownString, $userInput);
    }

    public static function replaceFirst($search, $replace, $subject)
    {
        \ZanPHP\Support\Str::replaceFirst($search, $replace, $subject);
    }

    public static function replaceLast($search, $replace, $subject)
    {
        \ZanPHP\Support\Str::replaceLast($search, $replace, $subject);
    }

    public static function upper($value)
    {
        \ZanPHP\Support\Str::upper($value);
    }

    public static function title($value)
    {
        \ZanPHP\Support\Str::title($value);
    }

    public static function slug($title, $separator = '-')
    {
        \ZanPHP\Support\Str::slug($title, $separator);
    }

    public static function snake($value, $delimiter = '_')
    {
        \ZanPHP\Support\Str::snake($value, $delimiter);
    }

    public static function startsWith($haystack, $needles)
    {
        \ZanPHP\Support\Str::startsWith($haystack, $needles);
    }

    public static function studly($value)
    {
        \ZanPHP\Support\Str::studly($value);
    }

    public static function substr($string, $start, $length = null)
    {
        \ZanPHP\Support\Str::substr($string, $start, $length);
    }

    public static function ucfirst($string)
    {
        \ZanPHP\Support\Str::ucfirst($string);
    }

    public static function trim($str, $prefix='', $suffix='')
    {
        \ZanPHP\Support\Str::trim($str, $prefix, $suffix);
    }

    public static function strSplit($str, $splitLength = 1)
    {
        \ZanPHP\Support\Str::strSplit($str, $splitLength);
    }

    public static function randomString($type = 'alnum', $length = 8)
    {
        \ZanPHP\Support\Str::randomString($type, $length);
    }

    public static function isAscii($str)
    {
        \ZanPHP\Support\Str::isAscii($str);
    }
}
