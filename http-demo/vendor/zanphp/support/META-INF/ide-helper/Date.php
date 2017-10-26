<?php

namespace Zan\Framework\Utilities\Types;

class Date
{
    private $Date;

    public function __construct($timestamp = null)
    {
        $this->Date = new \ZanPHP\Support\Date($timestamp);
    }

    public function isToday()
    {
        $this->Date->isToday();
    }

    public function isYesterday()
    {
        $this->Date->isYesterday();
    }

    public function isTomorrow()
    {
        $this->Date->isTomorrow();
    }

}