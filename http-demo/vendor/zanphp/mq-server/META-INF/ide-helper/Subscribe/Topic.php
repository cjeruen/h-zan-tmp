<?php

namespace Zan\Framework\Network\MqSubscribe\Subscribe;

class Topic
{
    private $Topic;

    public function __construct($name, Manager $manager)
    {
        $this->Topic = new \ZanPHP\MqServer\Subscribe\Topic($name, $manager);

    }

    public function getName()
    {
        $this->Topic->getName();
    }

    public function initChannel($name, array $config)
    {
        $this->Topic->initChannel($name, $config);
    }

    public function getChannels()
    {
        $this->Topic->getChannels();
    }
    
    public function incrMsgCount()
    {
        $this->Topic->incrMsgCount();
    }
}