<?php

namespace Zan\Framework\Utilities\Types;

class Ip
{
    public static function checkIp($requestIp, $ips)
    {
        \ZanPHP\Support\Ip::checkIp($requestIp, $ips);
    }

    public static function checkIp4($requestIp, $ip)
    {
        \ZanPHP\Support\Ip::checkIp4($requestIp, $ip);
    }

}
