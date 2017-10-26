<?php

namespace Zan\Framework\Network\Common;

class Curl
{
    private $Curl;

    public function __construct()
    {
        $this->Curl = new \ZanPHP\EtcdRegistry\Utils\Curl();
    }

    public function setMethod($method)
    {
        $this->Curl->setMethod($method);
    }

    public function setParams($params)
    {
        $this->Curl->setParams($params);
    }

    public function setUrl($url)
    {
        $this->Curl->setUrl($url);
    }

    public function setTimeout($timeout)
    {
        $this->Curl->setTimeout($timeout);
    }

    public function setConnectTimeout($connectTimeout)
    {
        $this->Curl->setConnectTimeout($connectTimeout);
    }

    public function setHeader(array $header)
    {
        $this->Curl->setHeader($header);
    }

    public function get($url, $params, $timeout = 3000)
    {
        $this->Curl->get($url, $params, $timeout);
    }

    public function post($url, $params, $timeout = 3000)
    {
        $this->Curl->post($url, $params, $timeout);
    }

    public function request($method, $url, $params, $timeout = 3000)
    {
        $this->Curl->request($method, $url, $params, $timeout);
    }

    public function response()
    {
        $this->Curl->response();
    }

    public function statusCode()
    {
        $this->Curl->statusCode();
    }

    public function isError()
    {
        $this->Curl->isError();
    }

    public function getError()
    {
        $this->Curl->getError();
    }
}