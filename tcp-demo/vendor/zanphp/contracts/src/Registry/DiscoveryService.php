<?php

namespace ZanPHP\Registry;


interface DiscoveryService
{
    public function subscribe(array $registryConfig, NotifyListener $listener);

    public function unsubscribe(array $registryConfig, NotifyListener $listener);

    public function discover(array $registryConfig);
}