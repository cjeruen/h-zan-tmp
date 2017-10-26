<?php

namespace Zan\Framework\Network\Http;

use swoole_http_response as SwooleHttpResponse;
use ZanPHP\HttpFoundation\Request\Request;

class Cookie
{
    private $Cookie;

    public function __construct(Request $request, SwooleHttpResponse $swooleResponse)
    {
        $this->Cookie = new \ZanPHP\HttpFoundation\Cookie($request, $swooleResponse);
    }

    public function get($key, $default = null)
    {
        $this->Cookie->get($key, $default);
    }

    public function set($key, $value = null, $expire = null, $path = null, $domain = null, $secure = null, $httpOnly = null)
    {
        $this->Cookie->set($key, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}
