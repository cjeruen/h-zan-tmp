<?php

namespace Kdt\Iron\Nova\Protocol\Packer;

class Native extends Abstracts
{
    private $Native;

    public function __construct()
    {
        $this->Native = new \ZanPHP\ThriftSerialization\Native();
    }

    protected function constructing()
    {
        $this->Native->constructing();
    }

    protected function processEncode($type, $name, $args, $side)
    {
        $this->Native->processEncode($type, $name, $args, $side);
    }

    protected function processDecode($data, $args, $side)
    {
        $this->Native->processDecode($data, $args, $side);
    }

}