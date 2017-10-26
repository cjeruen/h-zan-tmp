<?php

namespace Zan\Framework\Network\Http\Bag;

class ServerBag extends ParameterBag
{
    private $ServerBag;

    public function __construct()
    {
        $this->ServerBag = new \ZanPHP\HttpFoundation\Bag\ServerBag();
    }

    public function getHeaders()
    {
        $this->ServerBag->getHeaders();
    }
}
