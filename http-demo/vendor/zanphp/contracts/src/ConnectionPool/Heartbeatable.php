<?php

namespace ZanPHP\Contracts\ConnectionPool;


interface Heartbeatable
{
    public function ping();
}