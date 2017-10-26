<?php

namespace Zan\Framework\Utilities\Types;

class Json
{
    public static function encode($value, $options = 0, $depth = 512)
    {
        \ZanPHP\Support\Json::encode($value, $options, $depth);
    }

    public static function decode($json, $assoc = true, $depth = 512, $options = JSON_BIGINT_AS_STRING)
    {
        \ZanPHP\Support\Json::decode($json, $assoc, $depth, $options);
    }
}