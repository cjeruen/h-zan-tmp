<?php

namespace ZanPHP\HttpView;

use InvalidArgumentException;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Foundation\Application;
use ZanPHP\Coroutine\Event;
use ZanPHP\Support\Dir;

class Tpl
{
    private $_data = [];
    private $_tplPath = '';
    private $_event = '';
    private $_rootPath = '';

    public function __construct(Event $event)
    {
        $that = $this;
        $this->_event = $event;
        /** @var Application $application */
        $application = make(Application::class);
        $this->_rootPath = $application->getBasePath();
        $this->_event->bind('set_view_vars', function($args) use ($that) {
            $this->setViewVars($args);
        });
    }

    public function load($tpl, array $data = [])
    {
        $path = $this->getTplFullPath($tpl);
        extract(array_merge($this->_data, $data));
        require $path;
    }

    public function setTplPath($dir)
    {
        if(!is_dir($dir)){
            throw new InvalidArgumentException('Invalid tplPath for Layout:' . $dir);
        }
        $dir = Dir::formatPath($dir);
        $this->_tplPath = $dir;
    }

    public function setViewVars(array $data)
    {
        $this->_data = array_merge($this->_data, $data);
    }

    public function getTplFullPath($path)
    {
        if(false !== strpos($path, '.html')) {
            return $path;
        }
        $pathArr = $this->_parsePath($path);
        $pathArr = array_map([$this, '_pathUcfirst'], $pathArr);
        $module = array_shift($pathArr);
        $srcPath = $this->_rootPath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $repository = make(Repository::class);
        $customViewConfig = $repository->get('custom_view_config') ? $repository->get('custom_view_config') . DIRECTORY_SEPARATOR : '';
        $fullPath = $srcPath . $customViewConfig .
                $module . DIRECTORY_SEPARATOR .
                'View' . DIRECTORY_SEPARATOR .
                join(DIRECTORY_SEPARATOR, $pathArr) .
                '.html';
        return $fullPath;
    }

    private function _parsePath($path)
    {
        return explode('/', $path);
    }

    private function _pathUcfirst($path)
    {
        return ucfirst($path);
    }

}