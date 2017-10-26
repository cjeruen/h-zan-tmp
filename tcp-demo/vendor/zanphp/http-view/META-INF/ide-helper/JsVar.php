<?php

namespace Zan\Framework\Foundation\View;

class JsVar
{
    private $JsVar;

    public function __construct()
    {
        $this->JsVar = new \ZanPHP\HttpView\JsVar();
    }

    public function setSession($key, $value)
    {
        $this->JsVar->setSession($key, $value);
    }

    public function setConfig($key, $value)
    {
        $this->JsVar->setConfig($key, $value);
    }

    public function setQuery($key, $value)
    {
        $this->JsVar->setQuery($key, $value);
    }

    public function setEnv($key, $value)
    {
        $this->JsVar->setEnv($key, $value);
    }

    public function setBusiness($key, $value)
    {
        $this->JsVar->setBusiness($key, $value);
    }

    public function setShare($key, $value)
    {
        $this->JsVar->setShare($key, $value);
    }

    public function setDomain(array $domainList)
    {
        $this->JsVar->setDomain($domainList);
    }

    public function setCsrfToken($csrfToken)
    {
        $this->JsVar->setCsrfToken($csrfToken);
    }

    public function get()
    {
        $this->JsVar->get();
    }
}