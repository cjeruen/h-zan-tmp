<?php

namespace Zan\Framework\Utilities\Types;

class UA
{
    private $UA;

    public function __construct(array $headers = null, $userAgent = null)
    {
        $this->UA = new \ZanPHP\Utilities\Types\UA($headers, $userAgent);
    }

    public static function getScriptVersion()
    {
        \ZanPHP\Utilities\Types\UA::getScriptVersion();
    }


    public function setHttpHeaders($httpHeaders = null)
    {
        $this->UA->setHttpHeaders($httpHeaders);
    }


    public function getHttpHeaders()
    {
        $this->UA->getHttpHeaders();
    }

    public function getHttpHeader($header)
    {
        $this->UA->getHttpHeader($header);
    }

    public function getMobileHeaders()
    {
        $this->UA->getMobileHeaders();
    }

    public function getUaHttpHeaders()
    {
        $this->UA->getUaHttpHeaders();
    }

    public function setUserAgent($userAgent = null)
    {
        $this->UA->setUserAgent($userAgent);
    }

    public function getUserAgent()
    {
        $this->UA->getUserAgent();
    }

    public function setDetectionType($type = null)
    {
        $this->UA->setDetectionType($type);
    }

    public static function getPhoneDevices()
    {
        \ZanPHP\Utilities\Types\UA::getPhoneDevices();
    }

    public static function getTabletDevices()
    {
        \ZanPHP\Utilities\Types\UA::getTabletDevices();
    }

    public static function getUserAgents()
    {
        \ZanPHP\Utilities\Types\UA::getUserAgents();
    }

    public static function getBrowsers()
    {
        \ZanPHP\Utilities\Types\UA::getBrowsers();
    }

    public static function getUtilities()
    {
        \ZanPHP\Utilities\Types\UA::getUtilities();
    }

    public static function getMobileDetectionRules()
    {
        \ZanPHP\Utilities\Types\UA::getMobileDetectionRules();
    }

    public static function getOperatingSystems()
    {
        \ZanPHP\Utilities\Types\UA::getOperatingSystems();
    }

    public static function getProperties()
    {
        \ZanPHP\Utilities\Types\UA::getProperties();
    }

    public function getMobileDetectionRulesExtended()
    {
        $this->UA->getMobileDetectionRulesExtended();
    }

    public function getRules()
    {
        $this->UA->getRules();
    }

    public function checkHttpHeadersForMobile()
    {
        $this->UA->checkHttpHeadersForMobile();
    }

    public function __call($name, $arguments)
    {
        $this->UA->__call($name, $arguments);
    }

    protected function matchDetectionRulesAgainstUA($userAgent = null)
    {
        $this->UA->matchDetectionRulesAgainstUA($userAgent);
    }

    protected function matchUAAgainstKey($key, $userAgent = null)
    {
        $this->UA->matchUAAgainstKey($key, $userAgent);
    }

    public function isMobile($userAgent = null, $httpHeaders = null)
    {
        $this->UA->isMobile($userAgent, $httpHeaders);
    }

    public function isTablet($userAgent = null, $httpHeaders = null)
    {
        $this->UA->isTablet($userAgent, $httpHeaders);
    }

    public function is($key, $userAgent = null, $httpHeaders = null)
    {
        $this->UA->is($key, $userAgent, $httpHeaders);
    }

    public function match($regex, $userAgent = null)
    {
        $this->UA->match($regex, $userAgent);
    }

    public function prepareVersionNo($ver)
    {
        $this->UA->prepareVersionNo($ver);
    }

    public function version($propertyName, $type)
    {
        $this->UA->version($propertyName, $type);
    }

    public function mobileGrade()
    {
        $this->UA->mobileGrade();
    }
}