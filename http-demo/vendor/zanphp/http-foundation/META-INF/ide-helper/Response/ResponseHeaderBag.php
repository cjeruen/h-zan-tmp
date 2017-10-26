<?php

namespace Zan\Framework\Network\Http\Response;

use ZanPHP\HttpFoundation\Bag\HeaderBag;

class ResponseHeaderBag extends HeaderBag
{
    private $ResponseHeaderBag;

    public function __construct(array $headers = array())
    {
        parent::__construct();
        $this->ResponseHeaderBag = new \ZanPHP\HttpFoundation\Response\ResponseHeaderBag($headers);
    }

    public function __toString()
    {
        return $this->ResponseHeaderBag->__toString();
    }

    public function allPreserveCase()
    {
        $this->ResponseHeaderBag->allPreserveCase();
    }

    public function replace(array $headers = array())
    {
        $this->ResponseHeaderBag->replace($headers);
    }

    public function set($key, $values, $replace = true)
    {
        $this->ResponseHeaderBag->set($key, $values, $replace);
    }

    public function remove($key)
    {
        $this->ResponseHeaderBag->remove($key);
    }

    public function hasCacheControlDirective($key)
    {
        $this->ResponseHeaderBag->hasCacheControlDirective($key);
    }

    public function getCacheControlDirective($key)
    {
        $this->ResponseHeaderBag->getCacheControlDirective($key);
    }

    public function setCookie($cookie)
    {
        $this->ResponseHeaderBag->setCookie($cookie);
    }

    public function removeCookie($name, $path = '/', $domain = null)
    {
        $this->ResponseHeaderBag->removeCookie($name, $path, $domain);
    }

    public function getCookies($format)
    {
        $this->ResponseHeaderBag->getCookies($format);
    }

    public function clearCookie($name, $path = '/', $domain = null, $secure = false, $httpOnly = true)
    {
        $this->ResponseHeaderBag->clearCookie($name, $path, $domain, $secure , $httpOnly);
    }

    public function makeDisposition($disposition, $filename, $filenameFallback = '')
    {
        $this->ResponseHeaderBag->makeDisposition($disposition, $filename, $filenameFallback);
    }
}
