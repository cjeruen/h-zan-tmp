<?php

namespace Zan\Framework\Foundation\Exception;


class BusinessException extends ZanException
{
    public static function isValidCode($code)
    {
        \ZanPHP\Exception\BusinessException::isValidCode($code);
    }
}