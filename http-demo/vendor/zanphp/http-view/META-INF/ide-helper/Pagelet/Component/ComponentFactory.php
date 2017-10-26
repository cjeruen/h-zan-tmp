<?php

namespace Zan\Framework\Foundation\Pagelet\Component;

class ComponentFactory
{
    private $ComponentFactory;

    public function __construct()
    {
        $this->ComponentFactory = new \ZanPHP\HttpView\Pagelet\Component\ComponentFactory();
    }

    public static function getInstance()
    {
        \ZanPHP\HttpView\Pagelet\Component\ComponentFactory::getInstance();
    }

    public function create($componentGroup, $componentType, $componentKey)
    {
        $this->ComponentFactory->create($componentGroup, $componentType, $componentKey);
    }

}

