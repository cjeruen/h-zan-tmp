<?php

namespace ZanPHP\Contracts\Server;

interface Factory
{
    public function createHttpServer();
    public function createTcpServer();
    public function createMqServer();
    public function createWebSocketServer();
}