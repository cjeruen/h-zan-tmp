<?php

namespace ZanPHP\Contracts\LoadBalance;


interface Node
{

    /**
     * 0 ~ 100
     * @return int|null
     */
    public function getWeight();
}