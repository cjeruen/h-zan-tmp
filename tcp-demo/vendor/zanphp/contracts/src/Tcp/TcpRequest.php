<?php

namespace ZanPHP\Contracts\Tcp;

use ZanPHP\Contracts\Network\Request;

interface TcpRequest extends Request
{
    public function getGenericRoute();
    public function isGenericInvoke();
    public function getRpcContext();
    public function getArgs();
    public function getServiceName();
    public function getMethodName();
}