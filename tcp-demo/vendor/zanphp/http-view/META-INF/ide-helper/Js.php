<?php

namespace Zan\Framework\Foundation\View;

class Js extends BaseLoader
{
    private $Js;

    public function __construct()
    {
        $this->Js = new \ZanPHP\HttpView\Js();
    }

    public function syncLoad($index, $vendor = false, $crossorigin = false)
    {
        $this->Js->syncLoad($index, $vendor, $crossorigin);
    }

    public function asyncLoad($index, $vendor = false)
    {
        $this->Js->asyncLoad($index, $vendor);
    }

    public function getJsUrl($index, $vendor = false)
    {
        $this->Js->getJsUrl($index, $vendor);
    }

    public function replaceJs($html)
    {
        $this->Js->replaceJs($html);
    }

}
