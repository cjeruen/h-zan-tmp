<?php

use \ZanPHP\Contracts\ConnectionPool\Connection;
use \ZanPHP\Container\Container;
use \ZanPHP\NovaClient\NovaClient;


$container = Container::getInstance();
$container->bind("heartbeatable:nova", function($_, $args) {
    /** @var Connection  $novaConnection */
    $novaConnection = $args[0];
    $hbServName = "com.youzan.service.test";
    return NovaClient::getInstance($novaConnection, $hbServName);
});

return [

];