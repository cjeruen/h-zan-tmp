<?php

namespace ZanPHP\Contracts\Pool;


abstract class PooledObject
{
    public function isAlive() /* bool */
    {
        return true;
    }
}