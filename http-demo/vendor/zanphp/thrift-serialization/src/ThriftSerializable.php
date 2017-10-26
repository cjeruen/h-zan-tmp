<?php

namespace ZanPHP\ThriftSerialization;

use ZanPHP\Contracts\Codec\Serializable;

class ThriftSerializable implements Serializable
{
    const CLIENT = 1;
    const SERVER = 2;

    public $service;

    public $method;

    public $structEx;

    public $struct;

    public $side;

    public function serialize()
    {
        /* @var $packer PackerFacade */
        $packer = PackerFacade::getInstance();
        if ($this->structEx) {
            return $packer->encodeServiceException($this->service, $this->method, $this->structEx, $this->side);
        } else {
            return $packer->encodeServiceOutput($this->service, $this->method, $this->struct, $this->side);
        }
    }

    public function unserialize()
    {
        /* @var $packer PackerFacade */
        $packer = PackerFacade::getInstance();
        return $packer->decodeServiceArgs($this->service, $this->method, $this->struct, $this->side);
    }
}