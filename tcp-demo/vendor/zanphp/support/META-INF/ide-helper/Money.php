<?php

namespace Zan\Framework\Utilities\Types;

class Money
{
    private $Money;

    public function __construct()
    {
        $this->Money = new \ZanPHP\Support\Money();
    }

    public function toRmb()
    {
        $this->Money->toRmb();
    }

    public function toDollar()
    {
        $this->Money->toDollar();
    }

    public function toYuan()
    {
        $this->Money->toYuan();
    }

    public function rmDot()
    {
        $this->Money->rmDot();
    }

    public function addZero()
    {
        $this->Money->addZero();
    }

    public function rmDecimalAndAddZero()
    {
        $this->Money->rmDecimalAndAddZero();
    }

}