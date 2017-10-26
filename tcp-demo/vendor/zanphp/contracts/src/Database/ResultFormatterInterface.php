<?php

namespace ZanPHP\Contracts\Database;

interface ResultFormatterInterface
{
    /**
     * @return mixed(base on ResultType)
     */
    public function format();
}