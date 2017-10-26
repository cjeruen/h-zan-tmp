<?php
namespace Zan\Framework\Foundation\View;

use ZanPHP\Coroutine\Event;

class Layout
{
    private $Layout;

    public function __construct(Tpl $tpl, Event $event, $tplPath)
    {
        $this->Layout = new \ZanPHP\HttpView\Layout($tpl, $event, $tplPath);
    }

    public function render()
    {
        $this->Layout->render();
    }

    public function extend($tplPath)
    {
        $this->Layout->extend($tplPath);
    }

    public function block($blockName)
    {
        $this->Layout->block($blockName);
    }

    public function endBlock($blockName = null)
    {
        $this->Layout->endBlock($blockName);
    }

    public function place($blockName, $content = '')
    {
        $this->Layout->place($blockName, $content);
    }

    public function super($blockName = null)
    {
        $this->Layout->super($blockName);
    }

    public function getCurrentBlock()
    {
        $this->Layout->getCurrentBlock();
    }

}