<?php

namespace Zan\Framework\Network\Http\Response;

use ZanPHP\Contracts\Network\Response as ResponseContract;

class Response extends BaseResponse implements ResponseContract
{
    private $Response;

    public function __construct()
    {
        parent::__construct();
        $this->Response = new \ZanPHP\HttpFoundation\Response\Response($content);
    }

    public function setContent($content)
    {
        $this->Response->setContent($content);
    }

    public function getOriginalContent()
    {
        $this->Response->getOriginalContent();
    }

    public function withException(\Exception $e)
    {
        $this->Response->withException($e);
    }

    public function getException()
    {
        $this->Response->getException();
    }
}
