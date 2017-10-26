<?php

namespace Zan\Framework\Utilities\Types;

class Arr
{
    public static function join(array $before, array $after)
    {
        \ZanPHP\Support\Arr::join($before, $after);
    }

    public static function sortByArray(array $arr, array $sort, $withNotExists=false)
    {
        \ZanPHP\Support\Arr::sortByArray($arr, $sort, $withNotExists);
    }

    public static function merge()
    {
        \ZanPHP\Support\Arr::merge();
    }

    public static function mapKey(array $array, $col)
    {
        \ZanPHP\Support\Arr::mapKey($array, $col);
    }

    public static function array_cols($arr,$col,$default=false,$is_unique = false)
    {
        \ZanPHP\Support\Arr::array_cols($arr,$col,$default,$is_unique);
    }

    public static function createTreeByList(array $list, $value)
    {
        \ZanPHP\Support\Arr::createTreeByList($list, $value);
    }

    public static function accessible($value)
    {
        \ZanPHP\Support\Arr::accessible($value);
    }

    public static function dot($array, $prepend = '')
    {
        \ZanPHP\Support\Arr::dot($array, $prepend);
    }

    public static function exists($array, $key)
    {
        \ZanPHP\Support\Arr::exists($array, $key);
    }

    public static function get($array, $key, $default = null)
    {
        \ZanPHP\Support\Arr::get($array, $key, $default);
    }

    public static function has($array, $key)
    {
        \ZanPHP\Support\Arr::has($array, $key);
    }

    public static function set(&$array, $key, $value)
    {
        \ZanPHP\Support\Arr::set($array, $key, $value);
    }

    public static function where($array, callable $callback)
    {
        \ZanPHP\Support\Arr::where($array, $callback);
    }

    public static function except($array, $keys)
    {
        \ZanPHP\Support\Arr::except($array, $keys);
    }

    public static function forget(&$array, $keys)
    {
        \ZanPHP\Support\Arr::forget($array, $keys);
    }

    public static function only(array $array, array $keys)
    {
        \ZanPHP\Support\Arr::only($array, $keys);
    }

    public static function column(array $input, $columnKey, $indexKey = null)
    {
        \ZanPHP\Support\Arr::column($input, $columnKey, $indexKey);
    }

    public static function columns(array $input, $columnKeys, $indexKey = null)
    {
        \ZanPHP\Support\Arr::columns($input, $columnKeys, $indexKey);
    }

    public static function arraySort($arr, $col, $sort = 'desc', $default = false)
    {
        \ZanPHP\Support\Arr::arraySort($arr, $col, $sort, $default);
    }
}
