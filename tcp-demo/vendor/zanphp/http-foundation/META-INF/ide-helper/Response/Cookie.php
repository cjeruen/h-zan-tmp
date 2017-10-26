<?php

namespace Zan\Framework\Network\Http\Response;

class Cookie
{
    private $Cookie;

    public function __construct($name, $value = null, $expire = 0, $path = '/', $domain = null, $secure = false, $httpOnly = true)
    {
        $this->Cookie = new \ZanPHP\HttpFoundation\Response\Cookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    public function __toString()
    {
        return $this->Cookie->__toString();
    }

    public function getName()
    {
        $this->Cookie->getName();
    }

    public function getValue()
    {
        $this->Cookie->getValue();
    }

    public function getDomain()
    {
        $this->Cookie->getDomain();
    }

    public function getExpiresTime()
    {
        $this->Cookie->getExpiresTime();
    }

    public function getPath()
    {
        $this->Cookie->getPath();
    }

    public function isSecure()
    {
        $this->Cookie->isSecure();
    }

    public function isHttpOnly()
    {
        $this->Cookie->isHttpOnly();
    }

    public function isCleared()
    {
        $this->Cookie->isCleared();
    }
}
