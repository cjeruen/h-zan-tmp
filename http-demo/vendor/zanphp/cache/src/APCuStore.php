<?php

namespace  ZanPHP\Cache;

use ZanPHP\Contracts\Cache\ShareMemoryStore;

ini_set("apc.use_request_time", 0);

class APCuStore implements ShareMemoryStore
{
    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new APCu store.
     *
     * @param  string  $prefix
     */
    public function __construct($prefix)
    {
        if (!function_exists("apcu_fetch")) {
            throw new \RuntimeException("apcu not found");
        }

        $this->prefix = $prefix;
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string|array  $key
     * @return mixed
     */
    public function get($key)
    {
        $value = apcu_fetch($this->prefix . $key);

        if ($value === false) {
            return null;
        } else {
            return $value;
        }
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  float|int  $ttl seconds
     * @return void
     */
    public function put($key, $value, $ttl)
    {
        apcu_store($this->prefix . $key, $value, intval($ttl));
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int|bool
     */
    public function increment($key, $value = 1)
    {
        return apcu_inc($this->prefix . $key, $value);
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int|bool
     */
    public function decrement($key, $value = 1)
    {
        return apcu_dec($this->prefix . $key, $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        $this->put($key, $value, 0);
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function forget($key)
    {
        return apcu_delete($this->prefix . $key);
    }

    /**
     * Remove all items from the cache.
     *
     * @return bool
     */
    public function flush()
    {
        return apcu_clear_cache();
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }
}