<?php

namespace Zan\Framework\Network\MqSubscribe\Subscribe;

class Client
{
    private $Client;

    public function __construct($config, Channel $channel)
    {
        $this->Client = new \ZanPHP\MqServer\Subscribe\Client($config, $channel);
    }

    public function getConsumer()
    {
        $this->Client->getConsumer();
    }

    public function start()
    {
        $this->Client->start();
    }

    public function isError()
    {
        $this->Client->isError();
    }

    public function getErrorMessage()
    {
        $this->Client->getErrorMessage();
    }

    public function incrMsgCount()
    {
        $this->Client->incrMsgCount();
    }

    public function getMsgCount()
    {
        $this->Client->getMsgCount();
    }

    public function waitingClosed()
    {
        $this->Client->waitingClosed();
    }

    public function isWaitingClosed()
    {
        $this->Client->isWaitingClosed();
    }

    public function processing()
    {
        $this->Client->processing();
    }

    public function free()
    {
        $this->Client->free();
    }

    public function isProcessing()
    {
        $this->Client->isProcessing();
    }
}