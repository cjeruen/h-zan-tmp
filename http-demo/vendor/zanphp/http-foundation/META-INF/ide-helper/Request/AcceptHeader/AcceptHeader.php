<?php

namespace Zan\Framework\Network\Http\Request\AcceptHeader;

class AcceptHeader
{
    private $AcceptHeader;

    public function __construct(array $items)
    {
        $this->AcceptHeader = new \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeader($items);
    }

    public static function fromString($headerValue)
    {
        \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeader::fromString($headerValue);
    }

    public function __toString()
    {
        return $this->AcceptHeader->__toString();
    }

    public function has($value)
    {
        $this->AcceptHeader->has($value);
    }

    public function get($value)
    {
        $this->AcceptHeader->get($value);
    }

    public function add($item)
    {
        $this->AcceptHeader->add($item);
    }

    public function all()
    {
        $this->AcceptHeader->all();
    }

    public function filter($pattern)
    {
        $this->AcceptHeader->filter($pattern);
    }

    public function first()
    {
        $this->AcceptHeader->first();
    }
}
