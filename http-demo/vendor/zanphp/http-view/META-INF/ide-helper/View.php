<?php

namespace Zan\Framework\Foundation\View;

class View
{
    private $View;

    public function __construct($tplPath, array $data = [])
    {
        $this->View = new \ZanPHP\HttpView\View($tplPath, $data);
    }

    public static function display($tplPath, array $data = [])
    {
        \ZanPHP\HttpView\View::display($tplPath, $data);
    }

    public function render()
    {
        $this->View->render();
    }

}