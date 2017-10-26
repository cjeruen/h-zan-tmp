<?php

namespace ZanPHP\Nova\Service;

use ZanPHP\NovaFoundation\Foundation\Traits\InstanceManager;

class Initator
{
    use InstanceManager;

    public function init(array $configs)
    {
        NovaConfig::getInstance()->setConfig($configs);
        Scanner::getInstance()->scan();
    }
}