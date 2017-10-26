<?php

namespace ZanPHP\Contracts\ConnectionPool;

interface ConnectionPool
{

    /**
     * ConnectionPool constructor.
     * @param \Zan\Framework\Contract\Network\ConnectionFactory|ConnectionFactory $connectionFactory
     * @param array $config
     */
    public function __construct(ConnectionFactory $connectionFactory, array $config);

    /**
     * @param array $config
     * @return bool
     */
    public function reload(array $config);

    /**
     * @return \Zan\Framework\Contract\Network\Connection
     */
    public function get();

    /**
     * @param Connection $conn
     * @return bool
     */
    public function remove(Connection $conn);

    /**
     * @param Connection $conn
     * @return bool
     */
    public function recycle(Connection $conn);

}