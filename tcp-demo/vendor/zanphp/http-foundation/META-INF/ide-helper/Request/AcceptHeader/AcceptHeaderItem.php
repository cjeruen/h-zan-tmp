<?php

namespace Zan\Framework\Network\Http\Request\AcceptHeader;

class AcceptHeaderItem
{
    private $AcceptHeaderItem;

    public function __construct($value, array $attributes = array())
    {
        $this->AcceptHeaderItem  = new \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeaderItem($value,$attributes);
    }

    public static function fromString($itemValue)
    {
        \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeaderItem::fromString($itemValue);
    }

    public function __toString()
    {
        return $this->AcceptHeaderItem->__toString();
    }

    public function setValue($value)
    {
        $this->AcceptHeaderItem->setValue($value);
    }

    public function getValue()
    {
        $this->AcceptHeaderItem->getValue();
    }

    public function setQuality($quality)
    {
        $this->AcceptHeaderItem->setQuality($quality);
    }

    public function getQuality()
    {
        $this->AcceptHeaderItem->getQuality();
    }

    public function setIndex($index)
    {
        $this->AcceptHeaderItem->setIndex($index);
    }

    public function getIndex()
    {
        $this->AcceptHeaderItem->getIndex();
    }

    public function hasAttribute($name)
    {
        $this->AcceptHeaderItem->hasAttribute($name);
    }

    public function getAttribute($name, $default = null)
    {
        $this->AcceptHeaderItem->getAttribute($name, $default);
    }

    public function getAttributes()
    {
        $this->AcceptHeaderItem->getAttributes();
    }

    public function setAttribute($name, $value)
    {
        $this->AcceptHeaderItem->setAttribute($name, $value);
    }
}
