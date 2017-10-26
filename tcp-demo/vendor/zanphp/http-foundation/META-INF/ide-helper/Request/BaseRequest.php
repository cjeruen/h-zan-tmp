<?php

namespace Zan\Framework\Network\Http\Request;

class BaseRequest
{
    private $BaseRequest;

    public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->BaseRequest = new \ZanPHP\HttpFoundation\Request\BaseRequest($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->BaseRequest->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    public static function createFromGlobals()
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::createFromGlobals();
    }

    public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::create($uri, $method, $parameters, $cookies, $files, $server, $content);
    }

    public static function setFactory($callable)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::setFactory($callable);
    }

    public function duplicate(array $query = null, array $request = null, array $attributes = null, array $cookies = null, array $files = null, array $server = null)
    {
        $this->BaseRequest->duplicate();
    }

    public function __clone()
    {

    }

    public function __toString()
    {
        return $this->BaseRequest->__toString();
    }

    public function overrideGlobals()
    {
        $this->BaseRequest->overrideGlobals();
    }

    public static function setTrustedProxies(array $proxies)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::setTrustedProxies($proxies);
    }

    public static function getTrustedProxies()
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::getTrustedProxies();
    }

    public static function setTrustedHosts(array $hostPatterns)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::setTrustedHosts($hostPatterns);
    }

    public static function getTrustedHosts()
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::getTrustedHosts();
    }

    public static function setTrustedHeaderName($key, $value)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::setTrustedHeaderName($key, $value);
    }

    public static function getTrustedHeaderName($key)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::getTrustedHeaderName($key);
    }

    public static function normalizeQueryString($qs)
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::normalizeQueryString($qs);
    }

    public static function enableHttpMethodParameterOverride()
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::enableHttpMethodParameterOverride();
    }

    public static function getHttpMethodParameterOverride()
    {
        \ZanPHP\HttpFoundation\Request\BaseRequest::getHttpMethodParameterOverride();
    }

    public function parameter($key, $default = null)
    {
        $this->BaseRequest->parameter($key, $default);
    }

    public function getClientIps()
    {
        $this->BaseRequest->getClientIps();
    }

    public function getClientIp()
    {
        $this->BaseRequest->getClientIp();
    }

    public function getScriptName()
    {
        $this->BaseRequest->getScriptName();
    }

    public function getPathInfo()
    {
        $this->BaseRequest->getPathInfo();
    }

    public function getBasePath()
    {
        $this->BaseRequest->getBasePath();
    }

    public function getBaseUrl()
    {
        $this->BaseRequest->getBaseUrl();
    }

    public function getScheme()
    {
        $this->BaseRequest->getScheme();
    }

    public function getPort()
    {
        $this->BaseRequest->getPort();
    }

    public function getUser()
    {
        $this->BaseRequest->getUser();
    }

    public function getPassword()
    {
        $this->BaseRequest->getPassword();
    }

    public function getUserInfo()
    {
        $this->BaseRequest->getUserInfo();
    }

    public function getHttpHost()
    {
        $this->BaseRequest->getHttpHost();
    }

    public function getRequestUri()
    {
        $this->BaseRequest->getRequestUri();
    }

    public function getSchemeAndHttpHost()
    {
        $this->BaseRequest->getSchemeAndHttpHost();
    }

    public function getUri()
    {
        $this->BaseRequest->getUri();
    }

    public function getUriForPath($path)
    {
        $this->BaseRequest->getUriForPath($path);
    }

    public function getRelativeUriForPath($path)
    {
        $this->BaseRequest->getRelativeUriForPath($path);
    }

    public function getQueryString()
    {
        $this->BaseRequest->getQueryString();
    }

    public function isSecure()
    {
        $this->BaseRequest->isSecure();
    }

    public function getHost()
    {
        $this->BaseRequest->getHost();
    }

    public function setMethod($method)
    {
        $this->BaseRequest->setMethod($method);
    }

    public function getMethod()
    {
        $this->BaseRequest->getMethod();
    }

    public function getRealMethod()
    {
        $this->BaseRequest->getRealMethod();
    }

    public function getMimeType($format)
    {
        $this->BaseRequest->getMimeType($format);
    }

    public function getFormat($mimeType)
    {
        $this->BaseRequest->getFormat($mimeType);
    }

    public function setFormat($format, $mimeTypes)
    {
        $this->BaseRequest->setFormat($format, $mimeTypes);
    }

    public function getRequestFormat($default = 'html')
    {
        $this->BaseRequest->getRequestFormat($default);
    }

    public function setRequestFormat($format)
    {
        $this->BaseRequest->setRequestFormat($format);
    }

    public function getContentType()
    {
        $this->BaseRequest->getContentType();
    }

    public function setDefaultLocale($locale)
    {
        $this->BaseRequest->setDefaultLocale($locale);
    }

    public function getDefaultLocale()
    {
        $this->BaseRequest->getDefaultLocale();
    }

    public function setLocale($locale)
    {
        $this->BaseRequest->setLocale($locale);
    }

    public function getLocale()
    {
        $this->BaseRequest->getLocale();
    }

    public function isMethod($method)
    {
        $this->BaseRequest->isMethod($method);
    }

    public function isMethodSafe()
    {
        $this->BaseRequest->isMethodSafe();
    }

    public function getContent($asResource = false)
    {
        $this->BaseRequest->getContent($asResource);
    }

    public function getETags()
    {
        $this->BaseRequest->getETags();
    }

    public function isNoCache()
    {
        $this->BaseRequest->isNoCache();
    }

    public function getPreferredLanguage(array $locales = null)
    {
        $this->BaseRequest->getPreferredLanguage($locales);
    }

    public function getLanguages()
    {
        $this->BaseRequest->getLanguages();
    }

    public function getCharsets()
    {
        $this->BaseRequest->getCharsets();
    }

    public function getEncodings()
    {
        $this->BaseRequest->getEncodings();
    }

    public function getAcceptableContentTypes()
    {
        $this->BaseRequest->getAcceptableContentTypes();
    }

    public function isXmlHttpRequest()
    {
        $this->BaseRequest->isXmlHttpRequest();
    }
}
