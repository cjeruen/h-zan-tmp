<?php

return [
    \ZanPHP\ThriftSerialization\Abstracts::class => "\\Kdt\\Iron\\Nova\\Protocol\\Packer\\Abstracts",
    \ZanPHP\ThriftSerialization\Native::class => "\\Kdt\\Iron\\Nova\\Protocol\\Packer\\Native",
    \ZanPHP\ThriftSerialization\Packer::class =>"\\Kdt\\Iron\\Nova\\Protocol\\Packer",

    \ZanPHP\ThriftSerialization\ExceptionPacket::class => "\\Kdt\\Iron\\Nova\\Service\\ExceptionPacket",
    \ZanPHP\ThriftSerialization\PackerFacade::class => "\\Kdt\\Iron\\Nova\\Service\\PackerFacade",
    \ZanPHP\ThriftSerialization\StructValidator::class => "\\Kdt\\Iron\\Nova\\Service\\StructValidator",


    \ZanPHP\ThriftSerialization\ClassMap::class => "\\Kdt\\Iron\\Nova\\Service\\ClassMap",
    \ZanPHP\ThriftSerialization\Convert::class => "\\Kdt\\Iron\\Nova\\Service\\Convert",

    \ZanPHP\ThriftSerialization\NovaException::class => "\\Kdt\\Iron\\Nova\\Exception\\NovaException",
];