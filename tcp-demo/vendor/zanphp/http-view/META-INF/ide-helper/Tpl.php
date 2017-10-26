<?php

namespace Zan\Framework\Foundation\View;

use ZanPHP\Coroutine\Event;

class Tpl
{
    private $Tpl;

    public function __construct(Event $event)
    {
        $this->Tpl = new \ZanPHP\HttpView\Tpl($event);
    }

    public function load($tpl, array $data = [])
    {
        $this->Tpl->load($tpl, $data);
    }

    public function setTplPath($dir)
    {
        $this->Tpl->setTplPath($dir);
    }

    public function setViewVars(array $data)
    {
        $this->Tpl->setViewVars($data);
    }

    public function getTplFullPath($path)
    {
        $this->Tpl->getTplFullPath($path);
    }

}