<?php

namespace ZanPHP\Contracts\Validation;

use ZanPHP\Contracts\Support\MessageProvider;

class ValidationException extends \RuntimeException
{
    /**
     * The message provider implementation.
     * @var \Zan\Framework\Contract\Foundation\MessageProvider
     */
    protected $provider;

    /**
     * Create a new validation exception instance.
     * @var MessageProvider $provider
     */
    public function __construct(MessageProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Get the validation error message provider.
     * @return \Zan\Framework\Contract\Utilities\Types\MessageBag
     */
    public function errors()
    {
        return $this->provider->getMessageBag();
    }

    /**
     * Get the validation error message provider.
     * @return \Zan\Framework\Contract\Foundation\MessageProvider
     */
    public function getMessageProvider()
    {
        return $this->provider;
    }
}
