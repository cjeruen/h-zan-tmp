<?php

namespace ZanPHP\DnsClient;

use Exception;
use ZanPHP\Exception\SystemException;

class DnsLookupTimeoutException extends SystemException
{
    public function __construct($message = '', $code = 408, Exception $previous = null, array $metaData = [])
    {
        parent::__construct($message, $code, $previous);
    }
}