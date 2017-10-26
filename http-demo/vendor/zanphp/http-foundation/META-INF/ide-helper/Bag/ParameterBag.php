<?php

namespace Zan\Framework\Network\Http\Bag;

class ParameterBag implements \IteratorAggregate, \Countable
{
    private $ParameterBag ;

    public function __construct(array $parameters = array())
    {
        $this->ParameterBag = new \ZanPHP\HttpFoundation\Bag\ParameterBag($parameters);
    }

    public function all()
    {
        $this->ParameterBag->all();
    }

    public function keys()
    {
        $this->ParameterBag->keys();
    }

    public function replace(array $parameters = array())
    {
        $this->ParameterBag->replace($parameters);
    }

    public function add(array $parameters = array())
    {
        $this->ParameterBag->add($parameters);
    }

    public function get($key, $default = null)
    {
        $this->ParameterBag->get($key, $default);
    }

    public function set($key, $value)
    {
        $this->ParameterBag->set($key, $value);
    }

    public function has($key)
    {
        $this->ParameterBag->has($key);
    }

    public function remove($key)
    {
        $this->ParameterBag->remove($key);
    }

    public function getAlpha($key, $default = '')
    {
        $this->ParameterBag->getAlpha($key, $default);
    }

    public function getAlnum($key, $default = '')
    {
        $this->ParameterBag->getAlnum($key, $default);
    }

    public function getDigits($key, $default = '')
    {
        $this->ParameterBag->getDigits($key, $default);
    }

    public function getInt($key, $default = 0)
    {
        $this->ParameterBag->getInt($key, $default);
    }

    public function getBoolean($key, $default = false)
    {
        $this->ParameterBag->getBoolean($key, $default);
    }

    public function filter($key, $default = null, $filter = FILTER_DEFAULT, $options = array())
    {
        $this->ParameterBag->filter($key, $default, $filter, $options);
    }

    public function getIterator()
    {
        $this->ParameterBag->getIterator();
    }

    public function count()
    {
        $this->ParameterBag->count();
    }
}
