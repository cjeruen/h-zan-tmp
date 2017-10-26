<?php

namespace Zan\Framework\Utilities\File;

use ZanPHP\Coroutine\Contract\Async;

class File implements Async
{
    private $File;

    public function __construct($fileName)
    {
        $this->File = new \ZanPHP\Utilities\File\File($fileName);
    }

    public function read($length = 8000)
    {
        $this->File->read($length);
    }

    public function eof()
    {
        $this->File->eof();
    }

    public function seek($offset = -1)
    {
        $this->File->seek($offset);
    }

    public function tell()
    {
        $this->File->tell();
    }

    public function write($content)
    {
        $this->File->write($content);
    }

    public function execute(callable $callback, $task)
    {
        $this->File->execute($callback, $task);
    }

    public function readHandle()
    {
        $this->File->readHandle();
    }

    public function writeHandle($hasRead = 0)
    {
        $this->File->writeHandle($hasRead);
    }

    public function setCallback(callable $callback)
    {
        $this->File->setCallback($callback);
    }

}