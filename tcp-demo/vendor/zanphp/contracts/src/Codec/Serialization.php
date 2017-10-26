<?php

namespace ZanPHP\Contracts\Codec;


interface Serialization
{
    public function serialize($object);

    public function deserialize($byteBuffer);
}