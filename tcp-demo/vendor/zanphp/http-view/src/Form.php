<?php

namespace ZanPHP\HttpView;

use ZanPHP\HttpView\Plugin\KeyHash;

class Form
{
    private $keyHash = null;

    public function __construct()
    {
        $this->keyHash = new KeyHash();
    }

    public function model($modelKey)
    {

    }

    public function save()
    {

    }
}