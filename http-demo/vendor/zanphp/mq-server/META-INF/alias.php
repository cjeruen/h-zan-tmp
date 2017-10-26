<?php

return [
    \ZanPHP\MqServer\Subscribe\Channel::class => \Zan\Framework\Network\MqSubscribe\Subscribe\Channel::class,
    \ZanPHP\MqServer\Subscribe\Checker::class => \Zan\Framework\Network\MqSubscribe\Subscribe\Checker::class,
    \ZanPHP\MqServer\Subscribe\Client::class => \Zan\Framework\Network\MqSubscribe\Subscribe\Client::class,
    \ZanPHP\MqServer\Subscribe\Manager::class => \Zan\Framework\Network\MqSubscribe\Subscribe\Manager::class,
    \ZanPHP\MqServer\Subscribe\Topic::class => \Zan\Framework\Network\MqSubscribe\Subscribe\Topic::class,

    \ZanPHP\MqServer\WorkerStart\InitializeMqSubscribe::class => \Zan\Framework\Network\MqSubscribe\WorkerStart\InitializeMqSubscribe::class,

    \ZanPHP\MqServer\MqSubscribe::class => \Zan\Framework\Network\MqSubscribe\MqSubscribe::class,
    \ZanPHP\MqServer\Server::class => \Zan\Framework\Network\MqSubscribe\Server::class,
];