<?php

namespace Zan\Framework\Utilities\Pagination;

class Paginator
{
    private $Paginator;

    public function __construct($currentPage, $totalItems, $pageSize)
    {
        $this->Paginator = new \ZanPHP\HttpView\Pagination\Paginator($currentPage, $totalItems, $pageSize);
    }

    public function output()
    {
        $this->Paginator->output();
    }

    public function render($tplPath)
    {
        $this->Paginator->render($tplPath);
    }

}
