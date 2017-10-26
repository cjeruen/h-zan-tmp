<?php

namespace Zan\Framework\Contract\Store\Database;

use Zan\Framework\Contract\Network\Connection;

interface DriverInterface
{
    public function __construct(Connection $conn);

    /**
     * @param $sql
     * @return DbResultInterface
     */
    public function query($sql);

    /**
     * @param int $flags
     * @return DbResultInterface
     * @internal param bool $autoHandleException
     */
    public function beginTransaction($flags = 0);

    /**
     * @param int $flags
     * @return DbResultInterface
     */
    public function commit($flags = 0);

    /**
     * @param int $flags
     * @return DbResultInterface
     */
    public function rollback($flags = 0);

    /**
     * @param $link
     * @param $result
     * @return DbResultInterface
     */
    public function onSqlReady($link, $result);
}