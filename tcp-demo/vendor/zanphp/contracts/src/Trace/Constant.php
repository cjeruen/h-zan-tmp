<?php

namespace ZanPHP\Contracts\Trace;


class Constant
{
    const SUCCESS = '0';

    /******************** TYPE ******************/
    const NOVA = "Nova";
    const NOVA_CLIENT = 'Nova.Client';
    const NOVA_SERVER = 'Nova.Server';
    const HTTP = "Http";
    const WEBSOCKET = "WebSocket";
    const REMOTE_CALL = "RemoteCall";
    const SQL = "SQL";
    const REDIS = "Redis";
    const HTTP_CALL = "HttpCall";
    const NSQ_PUB = 'nsq.pub';

    /******************Event Type ******************/
    const NOVA_PROCCESS = 'Nova.Proccess.Event';
    const POST = "POST";
    const GET = "GET";
}