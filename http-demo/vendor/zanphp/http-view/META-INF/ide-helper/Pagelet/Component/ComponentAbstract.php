<?php

namespace Zan\Framework\Foundation\Pagelet\Component;

use ZanPHP\Contracts\Pagelet\ComponentInterface;

abstract class ComponentAbstract implements ComponentInterface
{
    /**
     * @param $key
     */
    abstract public function __construct($key);

    /**
     * @param $extraData
     * @return ComponentInterface;
     */
    abstract public function view(array $extraData);

    /**
     * @return ComponentInterface;
     */
    abstract public function edit();

    /**
     * @param $data
     * @return bool
     */
    abstract public function save(array $data);

    /**
     * @return string
     */
    abstract public function getType();
}

