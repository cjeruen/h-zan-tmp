<?php

namespace ZanPHP\Contracts\Session;

interface Storable
{
    /**
     * @return string
     */
    public function generateId();

    /**
     * @param $key
     * @return array
     */
    public function get($key);
    /**
     * @param $key
     * @param array $value
     * @return mixed
     */
    public function set($key, array $value);
    /**
     * @param $key
     * @return boolean
     */
    public function del($key);
}