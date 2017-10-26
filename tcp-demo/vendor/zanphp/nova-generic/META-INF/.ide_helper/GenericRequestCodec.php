<?php

namespace Zan\Framework\Network\Tcp;

final class GenericRequestCodec
{
    public static function isGenericService($serviceName)
    {
        \ZanPHP\NovaGeneric\GenericRequestCodec::isGenericService($serviceName);
    }

    public static function encode($serviceName, $methodName, $result)
    {
        \ZanPHP\NovaGeneric\GenericRequestCodec::encode($serviceName, $methodName, $result);
    }

    public static function decode($novaServiceName, $methodName, $args)
    {
        \ZanPHP\NovaGeneric\GenericRequestCodec::decode($novaServiceName, $methodName, $args);
    }
}