<?php

namespace ZanPHP\Contracts\ConnectionPool;

interface Connection
{
    public function getSocket();

    public function release();

    public function close();

    public function getEngine();

    public function getConfig();

    public function heartbeat();
}