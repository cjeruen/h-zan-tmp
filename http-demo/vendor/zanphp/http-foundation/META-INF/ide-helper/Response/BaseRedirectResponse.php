<?php

namespace Zan\Framework\Network\Http\Response;

class BaseRedirectResponse extends BaseResponse
{
    private $BaseRedirectResponse;

    public function __construct($url, $status = 302, $headers = array())
    {
        $this->BaseRedirectResponse = new \ZanPHP\HttpFoundation\Response\BaseRedirectResponse($url, $status, $headers);
    }

    public static function create($url = '', $status = 302, $headers = array())
    {
        \ZanPHP\HttpFoundation\Response\BaseRedirectResponse::create($url, $status, $headers);
    }

    public function getTargetUrl()
    {
        $this->BaseRedirectResponse->getTargetUrl();
    }

    public function setTargetUrl($url)
    {
        $this->BaseRedirectResponse->setTargetUrl($url);
    }
}
