<?php

namespace ZanPHP\Contracts\Hawk;

interface Hawk
{
    const SUCCESS_CODE = 200;
    const URI = '/report';

    const TOTAL_SUCCESS_TIME = 'totalSuccessTime';
    const TOTAL_SUCCESS_COUNT = 'totalSuccessCount';
    const MAX_SUCCESS_TIME = 'maxSuccessTime';
    const TOTAL_FAILURE_TIME = 'totalFailureTime';
    const TOTAL_FAILURE_COUNT = 'totalFailureCount';
    const MAX_FAILURE_TIME = 'maxFailureTime';
    const LIMIT_COUNT = 'limitCount';
    const TOTAL_CONCURRENCY = 'totalConcurrency';
    const CONCURRENCY_COUNT = 'concurrencyCount';

    const CLIENT = 'client';
    const SERVER = 'server';

    public function run($server);
    public function add($biz, array $metrics, array $tags = []);
    public function report();
    public function addServerServiceData($service, $method, $clientIp, $key, $val);
    public function addClientServiceData($service, $method, $serverIp, $key, $val);
    public function addTotalSuccessTime($side, $service, $method, $ip, $diffSec);
    public function addTotalFailureTime($side, $service, $method, $ip, $diffSec);
    public function addTotalSuccessCount($side, $service, $method, $ip);
    public function addTotalFailureCount($side, $service, $method, $ip);
}