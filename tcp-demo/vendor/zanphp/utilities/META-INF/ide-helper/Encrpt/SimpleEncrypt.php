<?php


namespace Zan\Framework\Utilities\Encrpt;

class SimpleEncrypt
{
    public static function xorText($text, $key)
    {
        \ZanPHP\Utilities\Encrpt\SimpleEncrypt::xorText($text, $key);
    }

    public static function encrypt($string, $key = null)
    {
        \ZanPHP\Utilities\Encrpt\SimpleEncrypt::encrypt($string, $key);
    }

    public static function decrypt($encrypted, $key = null)
    {
        \ZanPHP\Utilities\Encrpt\SimpleEncrypt::decrypt($encrypted, $key);
    }

}
