<?php

namespace ZanPHP\MqServer;
use ZanPHP\MqServer\Subscribe\Manager;


/**
 * Class MqSubscribe
 * @package Zan\Framework\Network\MqSubscribe
 * 
 * Mq Subscribe服务启动入口
 */
class MqSubscribe
{
    public function start()
    {
        Manager::singleton()->start();
    }
} 