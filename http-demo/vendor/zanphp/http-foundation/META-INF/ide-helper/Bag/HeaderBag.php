<?php

namespace Zan\Framework\Network\Http\Bag;

class HeaderBag implements \IteratorAggregate, \Countable
{
    private $HeaderBag;

    public function __construct(array $headers = array())
    {
        $this->HeaderBag = new \ZanPHP\HttpFoundation\Bag\HeaderBag($headers);
    }

    public function __toString()
    {
        return $this->HeaderBag->__toString();
    }

    public function all()
    {
        $this->HeaderBag->all();
    }

    public function keys()
    {
        $this->HeaderBag->keys();
    }

    public function replace(array $headers = array())
    {
        $this->HeaderBag->replace($headers);
    }

    public function add(array $headers)
    {
        $this->HeaderBag->add($headers);
    }

    public function get($key, $default = null, $first = true)
    {
        $this->HeaderBag->get($key, $default, $first);
    }

    public function set($key, $values, $replace = true)
    {
        $this->HeaderBag->set($key, $values, $replace);
    }

    public function has($key)
    {
        $this->HeaderBag->has($key);
    }

    public function contains($key, $value)
    {
        $this->HeaderBag->contains($key, $value);
    }

    public function remove($key)
    {
        $this->HeaderBag->remove($key);
    }

    public function getDate($key, \DateTime $default = null)
    {
        $this->HeaderBag->getDate($key, $default);
    }

    public function addCacheControlDirective($key, $value = true)
    {
        $this->HeaderBag->addCacheControlDirective($key, $value);
    }

    public function hasCacheControlDirective($key)
    {
        $this->HeaderBag->hasCacheControlDirective($key);
    }

    public function getCacheControlDirective($key)
    {
        $this->HeaderBag->getCacheControlDirective($key);
    }

    public function removeCacheControlDirective($key)
    {
        $this->HeaderBag->removeCacheControlDirective($key);
    }

    public function getIterator()
    {
        $this->HeaderBag->getIterator();
    }

    public function count()
    {
        $this->HeaderBag->count();
    }

    protected function getCacheControlHeader()
    {
        $this->HeaderBag->getCacheControlHeader();
    }

    protected function parseCacheControl($header)
    {
        $this->HeaderBag->parseCacheControl($header);
    }
}
