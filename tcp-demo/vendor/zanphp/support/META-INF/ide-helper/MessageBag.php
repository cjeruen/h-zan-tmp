<?php

namespace Zan\Framework\Utilities\Types;

use Countable;
use JsonSerializable;
use ZanPHP\Contracts\Support\Arrayable;
use ZanPHP\Contracts\Support\Jsonable;
use ZanPHP\Contracts\Support\MessageProvider;
use ZanPHP\Contracts\Support\MessageBag as MessageBagContract;

class MessageBag implements Arrayable, Countable, Jsonable, JsonSerializable, MessageBagContract, MessageProvider
{
    private $MessageBag;

    public function __construct(array $messages = [])
    {
        $this->MessageBag = new \ZanPHP\Support\MessageBag($messages);
    }

    public function keys()
    {
        $this->MessageBag->keys();
    }

    public function add($key, $message)
    {
        $this->MessageBag->add($key, $message);
    }

    public function merge($messages)
    {
        $this->MessageBag->merge($messages);
    }

    public function has($key = null)
    {
        $this->MessageBag->has($key);
    }

    public function first($key = null, $format = null)
    {
        $this->MessageBag->first($key, $format);
    }

    public function get($key, $format = null)
    {
        $this->MessageBag->get($key, $format);
    }

    public function all($format = null)
    {
        $this->MessageBag->all($format);
    }

    public function unique($format = null)
    {
        $this->MessageBag->unique($format);
    }

    public function messages()
    {
        $this->MessageBag->messages();
    }

    public function getMessages()
    {
        $this->MessageBag->getMessages();
    }

    public function getMessageBag()
    {
        $this->MessageBag->getMessageBag();
    }

    public function getFormat()
    {
        $this->MessageBag->getFormat();
    }

    public function setFormat($format = ':message')
    {
        $this->MessageBag->setFormat($format);
    }

    public function isEmpty()
    {
        $this->MessageBag->isEmpty();
    }

    public function any()
    {
        $this->MessageBag->any();
    }

    public function count()
    {
        $this->MessageBag->count();
    }

    public function toArray()
    {
        $this->MessageBag->toArray();
    }

    public function jsonSerialize()
    {
        $this->MessageBag->jsonSerialize();
    }

    public function toJson($options = 0)
    {
        $this->MessageBag->toJson($options);
    }

    public function __toString()
    {
        return $this->MessageBag->__toString();
    }
}
