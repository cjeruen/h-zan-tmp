<?php

namespace ZanPHP\Contracts\ConnectionPool;

interface ConnectionFactory
{
    /**
     * ConnectionFactory constructor.
     * @param array $config
     */
    public function __construct(array $config);

    /**
     * @return \ZanPHP\ConnectionPool\Driver\Base
     */
    public function create();

    public function close();

    public function getFactoryType();
}