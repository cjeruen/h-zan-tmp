<?php

return [
    \ZanPHP\WSServer\Request::class => \Zan\Framework\Network\WebSocket\Request::class,
    \ZanPHP\WSServer\RequestHandler::class => \Zan\Framework\Network\WebSocket\RequestHandler::class,
    \ZanPHP\WSServer\RequestTask::class => \Zan\Framework\Network\WebSocket\RequestTask::class,
    \ZanPHP\WSServer\Response::class => \Zan\Framework\Network\WebSocket\Response::class,
    \ZanPHP\WSServer\Server::class => \Zan\Framework\Network\WebSocket\Server::class,
];