<?php

namespace Zan\Framework\Network\MqSubscribe\Subscribe;

class Manager
{
    private $Manager;

    public function __construct($name, Topic $topic)
    {
        $this->Manager = new \ZanPHP\MqServer\Subscribe\Manager($name, $topic);
    }

    public function init(array $config)
    {
        $this->Manager->init($config);
    }

    public function start()
    {
        $this->Manager->start();
    }

    public function closePre()
    {
        $this->Manager->closePre();
    }

    public function checkReadyClose()
    {
        $this->Manager->checkReadyClose();
    }

    public function incrMsgCount()
    {
        $this->Manager->incrMsgCount();
    }
}