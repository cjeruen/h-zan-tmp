<?php

namespace Zan\Framework\Utilities\File;

use ZanPHP\Coroutine\Contract\Async;

class OnceFile implements Async
{
    private $OnceFile;

    public function __construct()
    {
        $this->OnceFile = new \ZanPHP\Utilities\File\OnceFile();
    }

    public function getContents($filename)
    {
        $this->OnceFile->getContents($filename);
    }

    public function putContents($filename,$content)
    {
        $this->OnceFile->putContents($filename,$content);
    }

    public function execute(callable $callback, $task)
    {
        $this->OnceFile->execute($callback, $task);
    }

    public function readHandle()
    {
        $this->OnceFile->readHandle();
    }

    public function writeHandle()
    {
        $this->OnceFile->writeHandle();
    }

    public function setCallback(callable $callback)
    {
        $this->OnceFile->setCallback($callback);
    }

}