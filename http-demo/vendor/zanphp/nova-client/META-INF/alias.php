<?php



return [
    \ZanPHP\NovaClient\NetworkException::class => "\\Kdt\\Iron\\Nova\\Exception\\NetworkException",
    \ZanPHP\NovaClient\ProtocolException::class => "\\Kdt\\Iron\\Nova\\Exception\\ProtocolException",

    \ZanPHP\NovaClient\NovaClient::class => "\\Kdt\\Iron\\Nova\\Network\\Client",
    \ZanPHP\NovaClient\ClientContext::class => "\\Kdt\\Iron\\Nova\\Network\\ClientContext",
];
