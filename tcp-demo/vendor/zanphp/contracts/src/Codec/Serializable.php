<?php

namespace ZanPHP\Contracts\Codec;


interface Serializable
{
    public function serialize();

    public function unserialize();
}