<?php

namespace Kdt\Iron\Nova\Service;

class Convert
{
    public static function argsToArray($data, $struct)
    {
        \ZanPHP\ThriftSerialization\Convert::argsToArray($data, $struct);
    }
}