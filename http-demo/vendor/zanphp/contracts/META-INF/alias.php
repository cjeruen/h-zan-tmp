<?php


return [
    \ZanPHP\Contracts\Pool\PooledObject::class => "\\Zan\\Framework\\Foundation\\Contract\\PooledObject",
    \ZanPHP\Contracts\Pool\PooledObjectFactory::class => "\\Zan\\Framework\\Foundation\\Contract\\PooledObjectFactory",

    \ZanPHP\Contracts\Validation\Factory::class => "\\Zan\\Framework\\Contract\\Utilities\\Validation\\Factory",
    \ZanPHP\Contracts\Validation\UnauthorizedException::class => "\\Zan\\Framework\\Contract\\Utilities\\Validation\\UnauthorizedException",
    \ZanPHP\Contracts\Validation\ValidatesWhenResolved::class => "\\Zan\\Framework\\Contract\\Utilities\\Validation\\ValidatesWhenResolved",
    \ZanPHP\Contracts\Validation\ValidationException::class => "\\Zan\\Framework\\Contract\\Utilities\\Validation\\ValidationException",
    \ZanPHP\Contracts\Validation\Validator::class => "\\Zan\\Framework\\Contract\\Utilities\\Validation\\Validator",

    \ZanPHP\Contracts\Support\Arrayable::class => "\\Zan\\Framework\\Contract\\Foundation\\Arrayable",

    \ZanPHP\Contracts\Support\MessageBag::class => "\\Zan\\Framework\\Contract\\Utilities\\Types\\MessageBag",
    \ZanPHP\Contracts\Support\MessageProvider::class => "\\Zan\\Framework\\Contract\\Foundation\\MessageProvider",

    \ZanPHP\Contracts\Support\Jsonable::class => "\\Zan\\Framework\\Contract\\Foundation\\Jsonable",
    \ZanPHP\Contracts\Support\Htmlable::class => "\\Zan\\Framework\\Contract\\Foundation\\Htmlable",


    \ZanPHP\Contracts\ConnectionPool\Base::class => "\\Zan\\Framework\\Network\\Connection\\Driver\\Base",
    \ZanPHP\Contracts\ConnectionPool\Connection::class => "\\Zan\\Framework\\Contract\\Network\\Connection",
    \ZanPHP\Contracts\ConnectionPool\ConnectionFactory::class => "\\Zan\\Framework\\Contract\\Network\\ConnectionFactory",
    \ZanPHP\Contracts\ConnectionPool\ConnectionPool::class => "\\Zan\\Framework\\Contract\\Network\\ConnectionPool",

    \ZanPHP\Contracts\Foundation\ExceptionHandler::class => "\\Zan\\Framework\\Contract\\Foundation\\ExceptionHandler",
    \ZanPHP\Contracts\Foundation\Bootable::class => "\\Zan\\Framework\\Contract\\Network\\Bootable",

    \ZanPHP\Contracts\Network\Request::class => "\\Zan\\Framework\\Contract\\Network\\Request",
    \ZanPHP\Contracts\Network\Response::class => "\\Zan\\Framework\\Contract\\Network\\Response",

    \ZanPHP\Contracts\Http\Url::class => "\\Zan\\Framework\\Contract\\Network\\Http\\Url",

    \ZanPHP\Contracts\Hawk\Hawker::class => "\\Zan\\Framework\\Sdk\\Monitor\\Hawker",

    \ZanPHP\Contracts\Database\DbResultInterface::class => "\\Zan\\Framework\\Contract\\Store\\Database\\DbResultInterface",
    \ZanPHP\Contracts\Database\DriverInterface::class => "\\Zan\\Framework\\Contract\\Store\\Database\\DriverInterface",
    \ZanPHP\Contracts\Database\ResultFormatterInterface::class => "\\Zan\\Framework\\Contract\\Store\\Database\\ResultFormatterInterface",
    \ZanPHP\Contracts\Database\ResultTypeInterface::class => "\\Zan\\Framework\\Contract\\Store\\Database\\ResultTypeInterface",

    \ZanPHP\Contracts\Trace\Constant::class => "\\Zan\\Framework\\Sdk\\Trace\\Constant",

    \ZanPHP\Contracts\Http\ResponseTrait::class => "\\Zan\\Framework\\Network\\Http\\Response\\ResponseTrait",

    \ZanPHP\Contracts\Pagelet\ComponentInterface::class => "\\Zan\\Framework\\Foundation\\Pagelet\\Contracts\\ComponentInterface",
    \ZanPHP\Contracts\Pagelet\ComponentOutputInterface::class => "\\Zan\\Framework\\Foundation\\Pagelet\\Contracts\\ComponentInterface",
    \ZanPHP\Contracts\Pagelet\ManagementInterface::class => "\\Zan\\Framework\\Foundation\\Pagelet\\Contracts\\ManagementInterface",
];