<?php

namespace Zan\Framework\Network\Http\Routing;

class UrlRuleInitiator
{
    private $UrlRuleInitiator;

    public function __construct()
    {
        $this->UrlRuleInitiator = new \ZanPHP\Routing\UrlRuleInitiator();
    }

    public function init()
    {
        $this->UrlRuleInitiator->init();
    }
} 