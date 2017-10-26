<?php

namespace Kdt\Iron\Nova\Service;

class ClassMap
{
    private $ClassMap;

    public function __construct()
    {
        $this->ClassMap = new \ZanPHP\ThriftSerialization\ClassMap();
    }

    public function setSpec($key, $object)
    {
        $this->ClassMap->setSpec($key, $object);
    }

    public function getSpec($key, $default=null)
    {
        $this->ClassMap->getSpec($key, $default);
    }

    public function getAllSpec()
    {
        $this->ClassMap->getAllSpec();
    }

}