<?php
namespace Zan\Framework\Network\Http\Bag;

class FileBag
{
    private $FileBag;

    public function __construct(array $files = array())
    {
        $this->FileBag = new \ZanPHP\HttpFoundation\Bag\FileBag($files);
    }

    public function replace(array $files = array())
    {
        $this->FileBag->replace($files);
    }

    public function set($key, $value)
    {
        $this->FileBag->set($key, $value);
    }

    public function add(array $files = array())
    {
        $this->FileBag->add($files);
    }

    protected function convertFileInformation($file)
    {
        $this->FileBag->convertFileInformation($file);
    }

    protected function fixPhpFilesArray($data)
    {
        $this->FileBag->fixPhpFilesArray($data);
    }
}
