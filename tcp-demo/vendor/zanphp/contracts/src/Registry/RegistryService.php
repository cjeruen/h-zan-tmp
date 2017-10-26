<?php

namespace ZanPHP\Registry;


interface RegistryService
{
    public function register(array $registryConfig);

    public function unregister(array $registryConfig);
}