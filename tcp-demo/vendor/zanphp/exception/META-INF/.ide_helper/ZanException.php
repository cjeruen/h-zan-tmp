<?php

namespace Zan\Framework\Foundation\Exception;


class ZanException extends \Exception
{
    private $ZanException;

    public function __construct($message = '', $code = 0, \Exception $previous = null, array $metaData = [])
    {
        parent::__construct($message, $code, $previous);
        $this->ZanException = new \ZanPHP\Exception\ZanException($message, $code, $previous);
    }

    public function getMetadata()
    {
        $this->ZanException->getMetadata();
    }

    public function setMetadata(array $metaData)
    {
        $this->ZanException->setMetadata($metaData);
    }
}