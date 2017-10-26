<?php

namespace ZanPHP\Console;

use Symfony\Component\Console\Input\ArgvInput;

class Bootstrap
{
    private $input;

    public function __construct()
    {
        $this->input = new ArgvInput();
    }

    public function hasParameterOption($values, $onlyParams = false)
    {
        return $this->input->getParameterOption($values, $onlyParams);
    }

    public function getParameterOption($values, $default = false, $onlyParams = false)
    {
        return $this->input->getParameterOption($values, $default, $onlyParams);
    }
}