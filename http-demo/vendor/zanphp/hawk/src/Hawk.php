<?php

namespace ZanPHP\Hawk;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Hawk\Hawker;
use ZanPHP\Support\Singleton;
use ZanPHP\Support\Arr;
use ZanPHP\Timer\Timer;
use ZanPHP\Contracts\Hawk\Hawk as HawkContract;

class Hawk implements HawkContract
{
    use Singleton;

    private $isRunning = false;
    /**
     * @var Hawker
     */
    private $hawkerImpl;

    public function run($server)
    {
        $repository = make(Repository::class);
        $config = $repository->get('hawk');
        if ($config['run'] == false) {
            return;
        }

        $zanHawkConfig = $repository->get('zan_hawk', []);
        if (!empty($zanHawkConfig)) {
            $config = Arr::merge($zanHawkConfig, $config);
        }

        if (isset($config['hawk_class'])) {
            $hawkerClass = $config['hawk_class'];
            if (is_subclass_of($hawkerClass, Hawker::class)) {
                $this->isRunning = true;
                $this->hawkerImpl = new $hawkerClass($server);
                Timer::tick($config['time'], [$this, 'report']);
                return;
            } else {
                throw new HawkException("$hawkerClass should be an Implementation of Hawker");
            }
        }
    }

    public function add($biz, array $metrics, array $tags = [])
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->add($biz, $metrics, $tags);
    }

    public function report()
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->report();
    }

    public function addServerServiceData($service, $method, $clientIp, $key, $val)
    {
        if ($this->isRunning == false) {
            return;
        }

        if (method_exists($this->hawkerImpl, "addServerServiceData")) {
            $this->hawkerImpl->addServerServiceData($service, $method, $clientIp, $key, $val);
        }
    }

    public function addClientServiceData($service, $method, $serverIp, $key, $val)
    {
        if ($this->isRunning == false) {
            return;
        }

        if (method_exists($this->hawkerImpl, "addClientServiceData")) {
            $this->hawkerImpl->addClientServiceData($service, $method, $serverIp, $key, $val);
        }
    }

    public function addTotalSuccessTime($side, $service, $method, $ip, $diffSec)
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->addTotalSuccessTime($side, $service, $method, $ip, $diffSec);
    }

    public function addTotalFailureTime($side, $service, $method, $ip, $diffSec)
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->addTotalFailureTime($side, $service, $method, $ip, $diffSec);
    }

    public function addTotalSuccessCount($side, $service, $method, $ip)
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->addTotalSuccessCount($side, $service, $method, $ip);
    }

    public function addTotalFailureCount($side, $service, $method, $ip)
    {
        if ($this->isRunning == false) {
            return;
        }

        $this->hawkerImpl->addTotalFailureCount($side, $service, $method, $ip);
    }

}