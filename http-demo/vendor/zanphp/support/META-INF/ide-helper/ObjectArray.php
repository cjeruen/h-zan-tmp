<?php

namespace Zan\Framework\Utilities\Types;

class ObjectArray
{
    private $ObjectArray;

    public function __construct()
    {
        $this->ObjectArray = new \ZanPHP\Support\ObjectArray();
    }

    public function push($object)
    {
        $this->ObjectArray->push($object);
    }

    public function pop()
    {
        $this->ObjectArray->pop();
    }

    public function remove($object)
    {
        $this->ObjectArray->remove($object);
    }

    public function length()
    {
        $this->ObjectArray->length();
    }

    public function get($key)
    {
        $this->ObjectArray->get($key);
    }

    public function isEmpty()
    {
        $this->ObjectArray->isEmpty();
    }
}