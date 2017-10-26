<?php

namespace ZanPHP\Contracts\ConnectionPool;

interface ConnectionManager
{
    public function get($connKey, $wait = true);
}
