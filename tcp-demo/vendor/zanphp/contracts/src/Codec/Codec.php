<?php

namespace ZanPHP\Contracts\Codec;


interface Codec
{
    /**
     * @param PDU $pdu
     * @return string
     * @throws \ZanPHP\Exception\Codec\CodecException
     */
    public function encode(PDU $pdu);

    /**
     * @param string $bytesBuffer
     * @param mixed $ctx
     * @return PDU
     * @throws \ZanPHP\Exception\Codec\CodecException
     */
    public function decode($bytesBuffer, $ctx = null);
}