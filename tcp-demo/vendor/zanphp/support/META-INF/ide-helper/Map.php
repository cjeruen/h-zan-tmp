<?php

namespace ZanPHP\Support;

class Map
{
    private $Map;

    public function __construct()
    {
        $this->Map = new \ZanPHP\Support\Map();
    }

    public function get($key, $default=null)
    {
        $this->Map->get($key, $default);
    }

    public function set($key, $value)
    {
        $this->Map->set($key, $value);
    }
}
