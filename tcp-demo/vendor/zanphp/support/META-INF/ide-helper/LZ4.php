<?php

namespace Zan\Framework\Utilities\Encode;

class LZ4
{
    private $LZ4;

    public function __construct()
    {
        $this->LZ4 = new \ZanPHP\Support\LZ4();
    }

    public function encode($str)
    {
        $this->LZ4->encode($str);
    }

    public function decode($str)
    {
        $this->LZ4->decode($str);
    }

    public function isLZ4($str)
    {
        $this->LZ4->isLZ4($str);
    }

}