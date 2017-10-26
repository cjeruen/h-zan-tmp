<?php

namespace Zan\Framework\Utilities\Validation;

use Closure;
use ZanPHP\Contracts\Validation\Factory as FactoryContract;

class Factory implements FactoryContract
{
    private $Factory;

    public function __construct()
    {
        $this->Factory = new \ZanPHP\Validation\Factory();
    }

    public static function make(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        \ZanPHP\Validation\Factory::make($data, $rules, $messages, $customAttributes);
    }

    protected function addExtensions(Validator $validator)
    {
        $this->Factory->addExtensions($validator);
    }

    protected function resolve(array $data, array $rules, array $messages, array $customAttributes)
    {
        $this->Factory->resolve($data, $rules, $messages, $customAttributes);
    }

    public function extend($rule, $extension, $message = null)
    {
        $this->Factory->extend($rule, $extension, $message);
    }

    public function extendImplicit($rule, $extension, $message = null)
    {
        $this->Factory->extendImplicit($rule, $extension, $message);
    }

    public function replacer($rule, $replacer)
    {
        $this->Factory->replacer($rule, $replacer);
    }

    public function resolver(Closure $resolver)
    {
        $this->Factory->resolver($resolver);
    }

}
