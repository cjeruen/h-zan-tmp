<?php

namespace Kdt\Iron\Nova\Foundation;

use Kdt\Iron\Nova\Foundation\Traits\InstanceManager;
use ZanPHP\Contracts\ConnectionPool\Connection;
use ZanPHP\NovaClient\NovaClient;
use ZanPHP\NovaConnectionPool\Exception\NoFreeConnectionException;
use ZanPHP\NovaConnectionPool\NovaClientConnectionManager;

abstract class TService
{
    const PROTOCOL = "nova";

    /**
     * Instance mgr
     */
    use InstanceManager;

    /**
     * @var TSpecification
     */
    private $relatedSpec = null;

    /**
     * @return TSpecification
     */
    abstract protected function specificationProvider();

    /**
     * @param $method
     * @param $args
     * @return array
     */
    final public function getInputStructSpec($method, $args = [])
    {
        $spec = $this->getRelatedSpec()->getInputStructSpec($method);
        foreach ($args as $i => $arg)
        {
            $spec[$i + 1]['value'] = $arg;
        }

        return $spec;
    }

    /**
     * @param $method
     * @return array
     */
    final public function getOutputStructSpec($method)
    {
        return $this->getRelatedSpec()->getOutputStructSpec($method);
    }

    /**
     * @param $method
     * @return array
     */
    final public function getExceptionStructSpec($method)
    {
        return $this->getRelatedSpec()->getExceptionStructSpec($method, true);
    }

    /**
     * @param $method
     * @param $arguments
     * @return \Generator
     * @throws NoFreeConnectionException
     * @throws \Zan\Framework\Foundation\Exception\System\InvalidArgumentException
     */
    final protected function apiCall($method, $arguments)
    {
        $domain = ""; // nova协议header中domain已经移除 !!!
        $serviceName = self::getNovaServiceName($this->getRelatedSpec()->getServiceName());
        $connection = (yield NovaClientConnectionManager::getInstance()->get(static::PROTOCOL, $domain, $serviceName, $method));
        if (!($connection instanceof Connection)) {
            throw new NoFreeConnectionException("get nova connection error");
        }

        // 历史原因 此处依赖NovaClient, 产生循环依赖
        $client = NovaClient::getInstance($connection, $serviceName);
        yield $client->call($method, $this->getInputStructSpec($method, $arguments), $this->getOutputStructSpec($method), $this->getExceptionStructSpec($method));
    }
    
    final public static function getNovaServiceName($specServiceName)
    {
        $nameArr = explode('.', $specServiceName);
        $className = array_pop($nameArr);
        $nameArr = array_map('lcfirst', $nameArr);
        $nameArr[] = $className;

        return join('.', $nameArr);
    }

    /**
     * @return TSpecification
     */
    final private function getRelatedSpec()
    {
        if (is_null($this->relatedSpec))
        {
            $this->relatedSpec = $this->specificationProvider();
        }
        return $this->relatedSpec;
    }
}