<?php

namespace Zan\Framework\Network\Http\Response;

use ZanPHP\Contracts\Network\Response as ResponseContract;

class JsonResponse extends BaseJsonResponse implements ResponseContract
{
    private $JsonResponse;

    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        parent::__construct();
        $this->JsonResponse = new \ZanPHP\HttpFoundation\Response\JsonResponse($data, $status, $headers, $options);
    }

    public function getData($assoc = false, $depth = 512)
    {
        $this->JsonResponse->getData($assoc, $depth);
    }

    public function setData($data = [])
    {
        $this->JsonResponse->setData($data);
    }

    public function getJsonOptions()
    {
        $this->JsonResponse->getJsonOptions();
    }

    public function setEncodingOptions($encodingOptions)
    {
        $this->JsonResponse->setEncodingOptions($encodingOptions);
    }

    public function setJsonOptions($options)
    {
        $this->JsonResponse->setJsonOptions($options);
    }
}
