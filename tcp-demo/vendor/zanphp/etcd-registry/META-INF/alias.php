<?php

return [
    \ZanPHP\EtcdRegistry\Exception\ServerConfigException::class => "\\Zan\\Framework\\Network\\ServerManager\\Exception\\ServerConfigException",
    \ZanPHP\EtcdRegistry\Exception\ServerDiscoveryEtcdException::class => "\\Zan\\Framework\\Network\\ServerManager\\Exception\\ServerDiscoveryEtcdException",


    \ZanPHP\EtcdRegistry\ServerDiscovery::class => "\\Zan\\Framework\\Network\\ServerManager\\ServerDiscovery",
    \ZanPHP\EtcdRegistry\ServerDiscoveryInitiator::class => "\\Zan\\Framework\\Network\\ServerManager\\ServerDiscoveryInitiator",
    \ZanPHP\EtcdRegistry\ServerRegister::class => "\\Zan\\Framework\\Network\\ServerManager\\ServerRegister",
    \ZanPHP\EtcdRegistry\ServerRegisterInitiator::class => "\\Zan\\Framework\\Network\\ServerManager\\ServerRegisterInitiator",
    \ZanPHP\EtcdRegistry\ServiceUnregister::class => "\\Zan\\Framework\\Network\\ServerManager\\ServiceUnregister",


    \ZanPHP\EtcdRegistry\Utils\Curl::class => "\\Zan\\Framework\\Network\\Common\\Curl",
];