<?php

namespace ZanPHP\Registry;


interface RegistryFactory
{
    public function getRegistry(array $registryConfig);
}