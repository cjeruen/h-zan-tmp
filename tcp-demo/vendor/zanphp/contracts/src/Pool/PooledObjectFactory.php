<?php

namespace ZanPHP\Contracts\Pool;


interface PooledObjectFactory
{
    public function create(); /* PooledObject */
    public function destroy(PooledObject $object);
}