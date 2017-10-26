<?php

namespace ZanPHP\Contracts\Config;

interface ConfigLoader
{
    public function load($path ,$ignoreStructure = false);

    public function loadDistinguishBetweenFolderAndFile($path);
}