<?php

namespace Zan\Framework\Utilities\Locker;

class ApcuLocker
{
    private $ApcuLocker;

    public function __construct($key)
    {
        $this->ApcuLocker = new \ZanPHP\Utilities\Locker\ApcuLocker();
    }

    public function isLocked()
    {
        $this->ApcuLocker->isLocked();
    }

    public function lock()
    {
        $this->ApcuLocker->lock();
    }

    public function unlock()
    {
        $this->ApcuLocker->unlock();
    }
}