<?php

namespace Zan\Framework\Utilities\DesignPattern;

class FilterChain
{
    private $FilterChain;

    public function __construct($request, $response, $context)
    {
        $this->FilterChain = new \ZanPHP\Utilities\DesignPattern\FilterChain($request, $response, $context);
    }

    public function addFilter($filter)
    {
        $this->FilterChain->addFilter($filter);
    }

    public function execute()
    {
        $this->FilterChain->execute();
    }
}