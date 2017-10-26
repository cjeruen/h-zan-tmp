<?php

namespace Kdt\Iron\Nova\Protocol;

class Packer
{
    private $Packer;

    public function __construct()
    {
        $this->Packer = new \ZanPHP\ThriftSerialization\Packer();
    }

    public function struct($successStruct, $exceptionStruct, $successData = null, $exceptionData = null)
    {
        $this->Packer->struct($successStruct, $exceptionStruct, $successData, $exceptionData);
    }

    public function encode($type, $name, $args, $side)
    {
        $this->Packer->encode($type, $name, $args, $side);
    }

    public function decode($data, $args, $side)
    {
        $this->Packer->decode($data, $args, $side);
    }
}