<?php

namespace Zan\Framework\Utilities\Validation;

use ZanPHP\Contracts\Validation\Validator as ValidatorContract;

class Validator implements ValidatorContract
{
    private $Validator;

    public function __construct(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        $this->Validator = new \ZanPHP\Validation\Validator($data, $rules, $messages, $customAttributes);
    }

    public function after($callback)
    {
        $this->Validator->after($callback);
    }

    public function sometimes($attribute, $rules, callable $callback)
    {
        $this->Validator->sometimes($attribute, $rules, $callback);
    }

    public function each($attribute, $rules)
    {
        $this->Validator->each($attribute, $rules);
    }

    public function mergeRules($attribute, $rules)
    {
        $this->Validator->mergeRules($attribute, $rules);
    }

    public function passes()
    {
        $this->Validator->passes();
    }

    public function fails()
    {
        $this->Validator->fails();
    }

    public function valid()
    {
        $this->Validator->valid();
    }

    public function invalid()
    {
        $this->Validator->invalid();
    }

    public function getDisplayableValue($attribute, $value)
    {
        $this->Validator->getDisplayableValue($attribute, $value);
    }

    public function getExtensions()
    {
        $this->Validator->getExtensions();
    }

    public function addExtensions(array $extensions)
    {
        $this->Validator->addExtensions($extensions);
    }

    public function addImplicitExtensions(array $extensions)
    {
        $this->Validator->addImplicitExtensions($extensions);
    }

    public function addExtension($rule, $extension)
    {
        $this->Validator->addExtension($rule, $extension);
    }

    public function addImplicitExtension($rule, $extension)
    {
        $this->Validator->addImplicitExtension($rule, $extension);
    }

    public function getReplacers()
    {
        $this->Validator->getReplacers();
    }

    public function addReplacers(array $replacers)
    {
        $this->Validator->addReplacers($replacers);
    }

    public function addReplacer($rule, $replacer)
    {
        $this->Validator->addReplacer($rule, $replacer);
    }

    public function getData()
    {
        $this->Validator->getData();
    }

    public function setData(array $data)
    {
        $this->Validator->setData($data);
    }

    public function getRules()
    {
        $this->Validator->getRules();
    }

    public function setRules(array $rules)
    {
        $this->Validator->setRules($rules);
    }

    public function setAttributeNames(array $attributes)
    {
        $this->Validator->setAttributeNames($attributes);
    }

    public function setValueNames(array $values)
    {
        $this->Validator->setValueNames($values);
    }

    public function getCustomMessages()
    {
        $this->Validator->getCustomMessages();
    }

    public function setCustomMessages(array $messages)
    {
        $this->Validator->setCustomMessages($messages);
    }

    public function getCustomAttributes()
    {
        $this->Validator->getCustomAttributes();
    }

    public function addCustomAttributes(array $customAttributes)
    {
        $this->Validator->addCustomAttributes($customAttributes);
    }

    public function getCustomValues()
    {
        $this->Validator->getCustomValues();
    }

    public function addCustomValues(array $customValues)
    {
        $this->Validator->addCustomValues($customValues);
    }

    public function getFallbackMessages()
    {
        $this->Validator->getFallbackMessages();
    }

    public function setFallbackMessages(array $messages)
    {
        $this->Validator->setFallbackMessages($messages);
    }

    public function failed()
    {
        $this->Validator->failed();
    }

    public function messages()
    {
        $this->Validator->messages();
    }

    public function errors()
    {
        $this->Validator->errors();
    }

    public function getMessageBag()
    {
        $this->Validator->getMessageBag();
    }

    public function __call($method, $parameters)
    {
        $this->Validator->__call($method, $parameters);
    }
}
