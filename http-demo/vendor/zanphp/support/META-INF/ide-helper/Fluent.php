<?php

namespace Zan\Framework\Utilities\Types;

use ArrayAccess;
use JsonSerializable;
use ZanPHP\Contracts\Support\Arrayable;
use ZanPHP\Contracts\Support\Jsonable;

class Fluent implements ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    private $Fluent;

    public function __construct($attributes = [])
    {
        $this->Fluent = new \ZanPHP\Support\Fluent($attributes);
    }

    public function get($key, $default = null)
    {
        $this->Fluent->get($key, $default);
    }

    public function getAttributes()
    {
        $this->Fluent->getAttributes();
    }

    public function toArray()
    {
        $this->Fluent->toArray();
    }

    public function jsonSerialize()
    {
        $this->Fluent->jsonSerialize();
    }

    public function toJson($options = 0)
    {
        $this->Fluent->toJson($options);
    }

    public function offsetExists($offset)
    {
        $this->Fluent->offsetExists($offset);
    }

    public function offsetGet($offset)
    {
        $this->Fluent->offsetGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->Fluent->offsetSet($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->Fluent->offsetUnset($offset);
    }

    public function __call($method, $parameters)
    {
        $this->Fluent->__call($method, $parameters);
    }

    public function __get($key)
    {
        $this->Fluent->__get($key);
    }

    public function __set($key, $value)
    {
        $this->Fluent->__set($key, $value);
    }

    public function __isset($key)
    {
        $this->Fluent->__isset($key);
    }

    public function __unset($key)
    {
        $this->Fluent->__unset($key);
    }
}
