<?php

namespace Zan\Framework\Utilities\Validation;

use Exception;

class ValidationException extends Exception
{
    private $ValidationException;

    public function __construct($validator, $response = null)
    {
        parent::__construct('');
        $this->ValidationException = new \ZanPHP\Validation\ValidationException();
    }

    public function getResponse()
    {
        $this->ValidationException->getResponse();
    }
}
