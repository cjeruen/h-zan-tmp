<?php

return [
    \ZanPHP\HttpView\Compressor\Css::class => \Zan\Framework\Foundation\View\Compressor\Css::class,
    \ZanPHP\HttpView\Compressor\Html::class => \Zan\Framework\Foundation\View\Compressor\Html::class,
    \ZanPHP\HttpView\Compressor\Js::class => \Zan\Framework\Foundation\View\Compressor\Js::class,

    \ZanPHP\HttpView\Pagelet\Component\ComponentAbstract::class => \Zan\Framework\Foundation\Pagelet\Component\ComponentAbstract::class,
    \ZanPHP\HttpView\Pagelet\Component\ComponentFactory::class => \Zan\Framework\Foundation\Pagelet\Component\ComponentFactory::class,

    \ZanPHP\HttpView\Pagination\Paginator::class => \Zan\Framework\Utilities\Pagination\Paginator::class,

    \ZanPHP\HttpView\Plugin\KeyHash::class => \Zan\Framework\Foundation\View\Plugin\KeyHash::class,
    \ZanPHP\HttpView\Plugin\Model::class => \Zan\Framework\Foundation\View\Plugin\Model::class,

    \ZanPHP\HttpView\BaseLoader::class => \Zan\Framework\Foundation\View\BaseLoader::class,
    \ZanPHP\HttpView\Css::class => \Zan\Framework\Foundation\View\Css::class,
    \ZanPHP\HttpView\Form::class => \Zan\Framework\Foundation\View\Form::class,
    \ZanPHP\HttpView\Js::class => \Zan\Framework\Foundation\View\Js::class,
    \ZanPHP\HttpView\JsVar::class => \Zan\Framework\Foundation\View\JsVar::class,
    \ZanPHP\HttpView\Layout::class => \Zan\Framework\Foundation\View\Layout::class,
    \ZanPHP\HttpView\Tpl::class => \Zan\Framework\Foundation\View\Tpl::class,
    \ZanPHP\HttpView\View::class => \Zan\Framework\Foundation\View\View::class,

];