<?php

namespace ZanPHP\Contracts\Server;

interface RequestExceptionHandlerChain
{
    public function init();
    public function handle(\Exception $e, array $extraHandlerChain = []);
}