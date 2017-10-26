<?php

namespace ZanPHP\Nova;

use ZanPHP\Nova\Service\Initator;
use ZanPHP\Nova\Service\NovaConfig;
use ZanPHP\Nova\Service\Registry;
use ZanPHP\Nova\Service\Scanner;
use ZanPHP\NovaFoundation\Foundation\TSpecification;
use ZanPHP\ThriftSerialization\Packer;
use ZanPHP\ThriftSerialization\PackerFacade;

class Nova
{

    const CLIENT = Packer::CLIENT;
    const SERVER = Packer::SERVER;

    public static function init(array $config)
    {
        Initator::newInstance()->init($config);
    }

    public static function getEtcdKeyList()
    {
        /** @var $registry Registry */
        $registry = Registry::getInstance();
        return $registry->getEtcdKeyList();
    }

    /**
     * @param $path
     * @param $baseNamespace
     * @return TSpecification[]
     */
    public static function getSpec($path, $baseNamespace)
    {
        /** @var Scanner $scanner */
        $scanner = Scanner::getInstance();
        return $scanner->scanSpecObjects($path, $baseNamespace);
    }

    public static function getAvailableService($protocol, $domain, $appName)
    {
        /** @var $registry Registry */
        $registry = Registry::getInstance();
        return $registry->getAll($protocol, $domain, $appName);
    }

    public static function removeNovaNamespace($serviceName, $appName)
    {
        /* @var $novaConfig NovaConfig */
        $novaConfig = NovaConfig::getInstance();
        return $novaConfig->removeNovaNamespace("nova", null, $appName, $serviceName);
    }

    /**
     * @deprecated
     */
    public static function decodeServiceArgs($serviceName, $methodName, $binArgs, $side = self::SERVER)
    {
        /* @var $packer PackerFacade */
        $packer = PackerFacade::getInstance();
        return $packer->decodeServiceArgs($serviceName, $methodName, $binArgs, $side);
    }

    /**
     * @deprecated
     */
    public static function encodeServiceOutput($serviceName, $methodName, $output, $side = self::SERVER)
    {
        /* @var $packer PackerFacade */
        $packer = PackerFacade::getInstance();
        return $packer->encodeServiceOutput($serviceName, $methodName, $output, $side);
    }

    /**
     * @deprecated
     */
    public static function encodeServiceException($serviceName, $methodName, $exception, $side = self::SERVER)
    {
        /* @var $packer PackerFacade */
        $packer = PackerFacade::getInstance();
        return $packer->encodeServiceException($serviceName, $methodName, $exception, $side);
    }

}