<?php

namespace ZanPHP\Contracts\Debugger;


interface Tracer
{
    const KEY = "X-Trace-Callback";

    /**
     * @param array $ctx
     * @return bool
     */
    public function parseTraceURI(array $ctx);

    public function getKey();

    public function beginRequest($type, $name, $req);

    public function endRequest($exception = null);

    /**
     * @param string $traceType
     * @param string $name
     * @param mixed $req
     * @return int transaction ID
     */
    public function beginTransaction($traceType, $name, $req);

    /**
     * @param int $tid transaction ID
     * @param $logType
     * @param array $res
     * @return void
     */
    public function commit($tid, $logType, $res = []);
}