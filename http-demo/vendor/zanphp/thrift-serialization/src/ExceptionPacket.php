<?php

namespace ZanPHP\ThriftSerialization;

use Thrift\Exception\TApplicationException;
use Thrift\Exception\TException as ThriftException;
use ZanPHP\Exception\ZanException;
use Kdt\Iron\Nova\Foundation\Traits\InstanceManager;

class ExceptionPacket
{
    /**
     * Instance mgr
     */
    use InstanceManager;

    /**
     * @var string
     */
    private $injectTag = 'IRON-E';

    /**
     * @var string
     */
    private $placeTag = '<||>';

    /**
     * @param \Throwable $e
     * @return \Throwable
     */
    public function ironInject($e)
    {
        if ($e instanceof ThriftException)
        {
            return $e;
        }
        else
        {
            return new TApplicationException($e instanceof ZanException ? $this->messageInject($e) : $e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param \Throwable $e
     * @return string
     */
    private function messageInject($e)
    {
        return sprintf('<%s[%s]>%s%s', $this->injectTag, get_class($e), $this->placeTag, $e->getMessage());
    }
}