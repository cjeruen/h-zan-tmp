<?php

namespace ZanPHP\MqServer\WorkerStart;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\MqServer\Subscribe\Checker;
use ZanPHP\MqServer\Subscribe\Manager;

class InitializeMqSubscribe
{
    /**
     * @param $server
     */
    public function bootstrap($server)
    {
        $repository = make(Repository::class);
        $config = $repository->get('nsqConfig', []);
        Checker::handle($config);
        Manager::singleton()->init($config);
    }
} 