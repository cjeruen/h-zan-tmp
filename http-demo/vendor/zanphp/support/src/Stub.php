<?php

namespace ZanPHP\Support;


abstract class Stub
{
    protected $realClassName = null;

    /**
     * @return null
     */
    public function getRealClassName()
    {
        return $this->realClassName;
    }
}