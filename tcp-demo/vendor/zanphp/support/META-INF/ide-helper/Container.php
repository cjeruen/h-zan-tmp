<?php

namespace Zan\Framework\Foundation\Container;

class Container
{
    private $Container;

    public function __construct()
    {
        $this->Container = new \ZanPHP\Support\Container();
    }

    public function get($abstract)
    {
        $this->Container->get($abstract);
    }

    public function set($alias, $instance)
    {
        $this->Container->set($alias, $instance);
    }

    public function setMockInstance($abstract, $instance)
    {
        $this->Container->setMockInstance($abstract, $instance);
    }

    public function addStub($stub)
    {
        $this->Container->addStub($stub);
    }

    public function cleanStub()
    {
        $this->Container->cleanStub();
    }

    public function singleton($abstract, array $parameters = [])
    {
        $this->Container->singleton($abstract, $parameters);
    }

    public function make($abstract, array $parameters = [], $shared = false)
    {
        $this->Container->make($abstract, $parameters, $shared);
    }

    protected function normalize($className)
    {
        $this->Container->normalize($className);
    }
}
