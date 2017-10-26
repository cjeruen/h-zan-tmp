<?php

namespace ZanPHP\Coroutine\Contract;

interface Async
{
    public function execute(callable $callback, $task);
}