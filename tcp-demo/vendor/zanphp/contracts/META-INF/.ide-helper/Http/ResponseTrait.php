<?php

namespace Zan\Framework\Network\Http\Response;

use swoole_http_response as SwooleHttpResponse;

trait ResponseTrait
{
    /**
     * Set a header on the Response.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  bool    $replace
     * @return $this
     */
    public function withHeader($key, $value, $replace = true)
    {

    }

    /**
     * Add an array of headers to the response.
     *
     * @param  array  $headers
     * @return $this
     */
    public function withHeaders(array $headers)
    {

    }

    /**
     * Add a cookie to the response.
     *
     * @param  \Zan\Framework\Network\Http\Response\Cookie  $cookie
     * @return $this
     */
    public function withCookie($cookie)
    {

    }

    /**
     * Add multiple cookies to the response.
     *
     * @param  array  $cookies
     * @return $this
     */
    public function withCookies(array $cookies)
    {

    }

    /**
     * Sends HTTP headers and content.
     *
     * @param SwooleHttpResponse $swooleHttpResponse
     * @return BaseResponse
     */
    public function sendBy(SwooleHttpResponse $swooleHttpResponse)
    {

    }

    /**
     * Sends HTTP headers.
     *
     * @param SwooleHttpResponse $swooleHttpResponse
     * @return BaseResponse
     */
    public function sendHeadersBy(SwooleHttpResponse $swooleHttpResponse)
    {

    }

    /**
     * Sends content for the current web response.
     *
     * @param SwooleHttpResponse $swooleHttpResponse
     * @return BaseResponse
     */
    public function sendContentBy(SwooleHttpResponse $swooleHttpResponse)
    {

    }
}
