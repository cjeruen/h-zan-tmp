<?php

namespace ZanPHP\Utilities\DesignPattern;

trait Instance
{
    public static function newInstance() {
        return new static();
    }
}
