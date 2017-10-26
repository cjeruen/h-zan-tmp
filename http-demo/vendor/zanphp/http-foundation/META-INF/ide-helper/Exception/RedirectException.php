<?php

namespace Zan\Framework\Network\Http\Exception;

use ZanPHP\Exception\BusinessException;

class RedirectException extends BusinessException
{
    private $RedirectException;

    public function __construct($url, $message)
    {
        parent::__construct($message);
        $this->RedirectException = new \ZanPHP\HttpFoundation\Exception\RedirectException($url, $message);
    }

    public function getRedirectUrl()
    {
        $this->RedirectException->getRedirectUrl();
    }

    public function setRedirectUrl($redirectUrl)
    {
        $this->RedirectException->setRedirectUrl($redirectUrl);
    }


}

