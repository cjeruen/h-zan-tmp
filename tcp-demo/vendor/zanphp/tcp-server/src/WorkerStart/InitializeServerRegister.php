<?php

namespace ZanPHP\TcpServer\WorkerStart;

use Zan\Framework\Contract\Network\Bootable;
use ZanPHP\EtcdRegistry\ServerRegisterInitiator;

class InitializeServerRegister implements Bootable
{
    /**
     * @param
     */
    public function bootstrap($server)
    {
        ServerRegisterInitiator::getInstance()->init();
    }
}