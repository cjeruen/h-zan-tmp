<?php

namespace ZanPHP\Exception;

use Psr\Log\LogLevel;

class SystemException extends ZanException
{
    public $logLevel = LogLevel::ERROR;
}