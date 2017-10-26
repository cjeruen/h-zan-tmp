<?php

namespace Zan\Framework\Utilities\Types;

class URL
{
    public static function setConfig(array &$config)
    {
        \ZanPHP\Utilities\Types\URL::setConfig(&$config);
    }

    public static function base($index = FALSE, $scheme = false)
    {
        \ZanPHP\Utilities\Types\URL::base($index, $scheme);
    }

    public static function site($url = '', $index = TRUE, $scheme = false)
    {
        \ZanPHP\Utilities\Types\URL::site($url, $index, $scheme);
    }

    public static function cdnSite($url, $imgExt = null, $scheme = false, $removeImgExt = false)
    {
        \ZanPHP\Utilities\Types\URL::cdnSite($url, $imgExt, $scheme, $removeImgExt);
    }

    public static function removeParams($ps=null,$url=null)
    {
        \ZanPHP\Utilities\Types\URL::removeParams($ps,$url);
    }

    public static function redirect($url,$code=302)
    {
        \ZanPHP\Utilities\Types\URL::redirect($url,$code);
    }

    public static function parseUrl($url)
    {
        \ZanPHP\Utilities\Types\URL::parseUrl($url);
    }

}
