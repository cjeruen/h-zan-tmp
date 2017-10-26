<?php

use ZanPHP\Support\Di;

$container = \ZanPHP\Container\Container::getInstance();

$container->bind("ServerBase.MqServer", function ($_, $args) {
    return Di::make(\ZanPHP\MqServer\Server::class, [$args[0], $args[1]]);
});

return [];