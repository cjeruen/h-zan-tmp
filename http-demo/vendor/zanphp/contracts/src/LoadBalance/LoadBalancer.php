<?php

namespace ZanPHP\Contracts\LoadBalance;


interface LoadBalancer
{

    /**
     * @param Node[] $nodes
     * @return null|Node
     */
    public function select(array $nodes);
}