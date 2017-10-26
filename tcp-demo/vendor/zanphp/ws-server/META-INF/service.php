<?php

use ZanPHP\Support\Di;

$container = \ZanPHP\Container\Container::getInstance();

$container->bind("ServerBase.WSServer", function ($_, $args) {
    return Di::make(\ZanPHP\WSServer\Server::class, [$args[0], $args[1]]);
});

return [];