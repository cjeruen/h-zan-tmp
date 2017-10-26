<?php

namespace Zan\Framework\Network\Http\Response;

class BaseJsonResponse extends BaseResponse
{
    private $BaseJsonResponse;

    public function __construct($data = null, $status = 200, $headers = array())
    {
        $this->BaseJsonResponse = new \ZanPHP\HttpFoundation\Response\BaseJsonResponse($data, $status, $headers);
    }

    public static function create($data = null, $status = 200, $headers = array())
    {
        \ZanPHP\HttpFoundation\Response\BaseJsonResponse::create($data, $status, $headers);
    }

    public function setCallback($callback = null)
    {
        $this->BaseJsonResponse->setCallback($callback);
    }

    public function setData($data = array())
    {
        $this->BaseJsonResponse->setData($data);
    }

    public function getEncodingOptions()
    {
        $this->BaseJsonResponse->getEncodingOptions();
    }

    public function setEncodingOptions($encodingOptions)
    {
        $this->BaseJsonResponse->setEncodingOptions($encodingOptions);
    }
}
