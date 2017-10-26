<?php

namespace Zan\Framework\Network\Http\Response;

use ZanPHP\HttpFoundation\Request\BaseRequest;

class BaseResponse
{
    private $BaseResponse;

    public function __construct($content = '', $status = 200, $headers = array())
    {
        $this->BaseResponse = new \ZanPHP\HttpFoundation\Response\BaseResponse($content, $status, $headers);
    }

    public static function create($content = '', $status = 200, $headers = array())
    {
        \ZanPHP\HttpFoundation\Response\BaseResponse::create($content, $status, $headers);
    }

    public static function closeOutputBuffers($targetLevel, $flush)
    {
        \ZanPHP\HttpFoundation\Response\BaseResponse::closeOutputBuffers($targetLevel, $flush);
    }

    public function __toString()
    {
        return $this->BaseResponse->__toString();
    }

    public function __clone()
    {

    }

    public function prepare(BaseRequest $request)
    {
        $this->BaseResponse->prepare($request);
    }

    public function sendHeaders()
    {
        $this->BaseResponse->sendHeaders();
    }

    public function sendContent()
    {
        $this->BaseResponse->sendContent();
    }

    public function send()
    {
        $this->BaseResponse->send();
    }

    public function setContent($content)
    {
        $this->BaseResponse->setContent($content);
    }

    public function getContent()
    {
        $this->BaseResponse->getContent();
    }

    public function setProtocolVersion($version)
    {
        $this->BaseResponse->setProtocolVersion($version);
    }

    public function getProtocolVersion()
    {
        $this->BaseResponse->getProtocolVersion();
    }

    public function setStatusCode($code, $text = null)
    {
        $this->BaseResponse->setStatusCode($code, $text);
    }

    public function getStatusCode()
    {
        $this->BaseResponse->getStatusCode();
    }

    public function setCharset($charset)
    {
        $this->BaseResponse->setCharset($charset);
    }

    public function getCharset()
    {
        $this->BaseResponse->getCharset();
    }

    public function isCacheable()
    {
        $this->BaseResponse->isCacheable();
    }

    public function isFresh()
    {
        $this->BaseResponse->isFresh();
    }

    public function isValidateable()
    {
        $this->BaseResponse->isValidateable();
    }

    public function setPrivate()
    {
        $this->BaseResponse->setPrivate();
    }

    public function setPublic()
    {
        $this->BaseResponse->setPublic();
    }

    public function mustRevalidate()
    {
        $this->BaseResponse->mustRevalidate();
    }

    public function getDate()
    {
        $this->BaseResponse->getDate();
    }

    public function setDate(\DateTime $date)
    {
        $this->BaseResponse->setDate($date);
    }

    public function getAge()
    {
        $this->BaseResponse->getAge();
    }

    public function expire()
    {
        $this->BaseResponse->expire();
    }

    public function getExpires()
    {
        $this->BaseResponse->getExpires();
    }

    public function setExpires(\DateTime $date = null)
    {
        $this->BaseResponse->setExpires($date);
    }

    public function getMaxAge()
    {
        $this->BaseResponse->getMaxAge();
    }

    public function setMaxAge($value)
    {
        $this->BaseResponse->setMaxAge($value);
    }

    public function setSharedMaxAge($value)
    {
        $this->BaseResponse->setSharedMaxAge($value);
    }

    public function getTtl()
    {
        $this->BaseResponse->getTtl();
    }

    public function setTtl($seconds)
    {
        $this->BaseResponse->setTtl($seconds);
    }

    public function setClientTtl($seconds)
    {
        $this->BaseResponse->setClientTtl($seconds);
    }

    public function getLastModified()
    {
        $this->BaseResponse->getLastModified();
    }

    public function setLastModified(\DateTime $date = null)
    {
        $this->BaseResponse->setLastModified($date);
    }

    public function getEtag()
    {
        $this->BaseResponse->getEtag();
    }

    public function setEtag($etag = null, $weak = false)
    {
        $this->BaseResponse->setEtag($etag, $weak);
    }

    public function setCache(array $options)
    {
        $this->BaseResponse->setCache($options);
    }

    public function setNotModified()
    {
        $this->BaseResponse->setNotModified();
    }

    public function hasVary()
    {
        $this->BaseResponse->hasVary();
    }

    public function getVary()
    {
        $this->BaseResponse->getVary();
    }

    public function setVary($headers, $replace = true)
    {
        $this->BaseResponse->setVary($headers, $replace);
    }

    public function isNotModified(BaseRequest $request)
    {
        $this->BaseResponse->isNotModified($request);
    }

    public function isInvalid()
    {
        $this->BaseResponse->isInvalid();
    }

    public function isInformational()
    {
        $this->BaseResponse->isInformational();
    }

    public function isSuccessful()
    {
        $this->BaseResponse->isSuccessful();
    }

    public function isRedirection()
    {
        $this->BaseResponse->isRedirection();
    }

    public function isClientError()
    {
        $this->BaseResponse->isClientError();
    }

    public function isServerError()
    {
        $this->BaseResponse->isServerError();
    }

    public function isOk()
    {
        $this->BaseResponse->isOk();
    }

    public function isForbidden()
    {
        $this->BaseResponse->isForbidden();
    }

    public function isNotFound()
    {
        $this->BaseResponse->isNotFound();
    }

    public function isRedirect($location = null)
    {
        $this->BaseResponse->isRedirect($location);
    }

    public function isEmpty()
    {
        $this->BaseResponse->isEmpty();
    }
}
