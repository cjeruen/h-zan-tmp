<?php

namespace Kdt\Iron\Nova\Service;

class StructValidator
{
    public static function validateInput(array $args, array $inputStruct, $side)
    {
        \ZanPHP\ThriftSerialization\StructValidator::validateInput($args, $inputStruct, $side);
    }

    public static function validateOutput(array $outputStruct, $side)
    {
        \ZanPHP\ThriftSerialization\StructValidator::validateOutput($outputStruct, $side);
    }

}