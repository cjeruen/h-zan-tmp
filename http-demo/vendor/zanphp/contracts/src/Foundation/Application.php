<?php

namespace ZanPHP\Contracts\Foundation;

interface Application
{
    public function getName();
    public function getBasePath();
    public function getNamespace();
}