<?php

namespace ZanPHP\Contracts\RateLimit;


interface RateLimiter
{
    public function acquire($permits = 1);
}