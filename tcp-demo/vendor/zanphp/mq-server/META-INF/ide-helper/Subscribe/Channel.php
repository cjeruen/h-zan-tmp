<?php

namespace Zan\Framework\Network\MqSubscribe\Subscribe;

class Channel
{
    private $Channel;
    
    public function __construct($name, Topic $topic)
    {
        $this->Channel = new \ZanPHP\MqServer\Subscribe\Channel($name, $topic);
    }

    public function getName()
    {
        $this->Channel->getName();
    }

    public function getTopic()
    {
        $this->Channel->getTopic();
    }

    public function initClient(array $config)
    {
        $this->Channel->initClient($config);
    }

    public function getClients()
    {
        $this->Channel->getClients();
    }
    
    public function incrMsgCount()
    {
        $this->Channel->incrMsgCount();
    }
}