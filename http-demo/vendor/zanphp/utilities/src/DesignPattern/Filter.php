<?php

namespace ZanPHP\Utilities\DesignPattern;

interface Filter
{
    public function doFilter($request, $response, $context);
}