<?php

namespace ZanPHP\Exception\Codec;


use Psr\Log\LogLevel;
use ZanPHP\Exception\ZanException;

class CodecException extends ZanException
{
    public $logLevel = LogLevel::ERROR;
}