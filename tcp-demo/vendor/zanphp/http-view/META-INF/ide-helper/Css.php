<?php

namespace Zan\Framework\Foundation\View;

class Css extends BaseLoader
{
    private $Css;

    public function __construct()
    {
        $this->Css = new \ZanPHP\HttpView\Css();
    }

    public function load($index, $vendor = false)
    {
        $this->Css->load($index, $vendor);
    }

    public function getCssURL($index, $vendor = false)
    {
        $this->Css->getCssURL($index, $vendor);
    }
}
