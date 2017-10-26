<?php

namespace Kdt\Iron\Nova\Service;

class PackerFacade
{
    private $PackerFacade;

    public function __construct()
    {
        $this->PackerFacade = new \ZanPHP\ThriftSerialization\PackerFacade();
    }

    public function decodeServiceArgs($serviceName, $methodName, $binArgs, $side)
    {
        $this->PackerFacade->decodeServiceArgs($serviceName, $methodName, $binArgs, $side);
    }

    public function encodeServiceOutput($serviceName, $methodName, $output, $side)
    {
        $this->PackerFacade->encodeServiceOutput($serviceName, $methodName, $output, $side);
    }

    protected function parseNullResult($output)
    {
        $this->PackerFacade->parseNullResult($output);
    }

    public function encodeServiceException($serviceName, $methodName, $exceptions, $side)
    {
        $this->PackerFacade->encodeServiceException($serviceName, $methodName, $exceptions, $side);
    }

}