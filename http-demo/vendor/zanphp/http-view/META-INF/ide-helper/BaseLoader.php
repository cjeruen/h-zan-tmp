<?php

namespace Zan\Framework\Foundation\View;

use ZanPHP\Coroutine\Event;

class BaseLoader
{
    private $BaseLoader;

    public function __construct(Event $event)
    {
        $this->BaseLoader = new \ZanPHP\HttpView\BaseLoader($event);
    }

    public function setCurrentBlock($blockName)
    {
        $this->BaseLoader->setCurrentBlock($blockName);
    }

    public function setCurrentEndBlock($blockName)
    {
        $this->BaseLoader->setCurrentEndBlock($blockName);
    }

    public function getCdnType()
    {
        $this->BaseLoader->getCdnType();
    }
}