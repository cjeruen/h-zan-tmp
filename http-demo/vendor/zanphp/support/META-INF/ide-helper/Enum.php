<?php

namespace Zan\Framework\Utilities\Types;

class Enum
{
    public static function toArray()
    {
        \ZanPHP\Support\Enum::toArray();
    }

    public static function getConstants()
    {
        \ZanPHP\Support\Enum::getConstants();
    }
}