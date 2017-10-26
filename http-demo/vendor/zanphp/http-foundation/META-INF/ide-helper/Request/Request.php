<?php

namespace Zan\Framework\Network\Http\Request;

use swoole_http_request as SwooleHttpRequest;

use ZanPHP\Contracts\Http\HttpRequest as RequestContract;
use ZanPHP\Contracts\Support\Arrayable;

class Request extends BaseRequest implements Arrayable, RequestContract
{
    private $Request;

    public function __construct()
    {
        parent::__construct();
        $this->Request = new \ZanPHP\HttpFoundation\Request\Request();
    }

    public static function createFromSwooleHttpRequest(SwooleHttpRequest $swooleRequest)
    {
        \ZanPHP\HttpFoundation\Request\Request::createFromSwooleHttpRequest($swooleRequest);
    }

    public static function matchesType($actual, $type)
    {
        \ZanPHP\HttpFoundation\Request\Request::matchesType($actual, $type);
    }

    public function getUri()
    {
        $this->Request->getUri();
    }

    public function getUrlRoot()
    {
        $this->Request->getUrlRoot();
    }

    public function getUrl()
    {
        $this->Request->getUrl();
    }

    public function getFullUrl()
    {
        $this->Request->getFullUrl();
    }

    public function getFullUrlWithAddedQuery(array $query)
    {
        $this->Request->getFullUrlWithAddedQuery($query);
    }

    public function getPath()
    {
        $this->Request->getPath();
    }

    public function getDecodedPath()
    {
        $this->Request->getDecodedPath();
    }

    public function getSegment($index, $default = null)
    {
        $this->Request->getSegment($index, $default);
    }

    public function getSegments()
    {
        $this->Request->getSegments();
    }

    public function is()
    {
        $this->Request->is();
    }

    public function isFullUrlMatch()
    {
        $this->Request->isFullUrlMatch();
    }

    public function isAjax()
    {
        $this->Request->isAjax();
    }

    public function isPjax()
    {
        $this->Request->isPjax();
    }

    public function exists($key)
    {
        $this->Request->exists($key);
    }

    public function has($key)
    {
        $this->Request->has($key);
    }

    protected function isEmptyString($key)
    {
        $this->Request->isEmptyString($key);
    }

    public function all()
    {
        $this->Request->all();
    }

    public function input($key = null, $default = null)
    {
        $this->Request->input($key, $default);
    }

    public function only($keys)
    {
        $this->Request->only($keys);
    }

    public function except($keys)
    {
        $this->Request->except($keys);
    }
    public function get($key = null, $default = null)
    {
        $this->Request->get($key, $default);
    }

    public function post($key = null, $default = null)
    {
        $this->Request->post($key, $default);
    }

    public function hasCookie($key)
    {
        $this->Request->hasCookie($key);
    }

    public function cookie($key = null, $default = null)
    {
        $this->Request->cookie($key, $default);
    }

    public function header($key = null, $default = null)
    {
        $this->Request->header($key, $default);
    }

    public function server($key = null, $default = null)
    {
        $this->Request->server($key, $default);
    }

    public function merge(array $input)
    {
        $this->Request->merge($input);
    }

    public function replace(array $input)
    {
        $this->Request->replace($input);
    }

    public function json($key = null, $default = null)
    {
        $this->Request->json($key, $default);
    }

    public function isJson()
    {
        $this->Request->isJson();
    }

    public function wantsJson()
    {
        $this->Request->wantsJson();
    }

    public function accepts($contentTypes)
    {
        $this->Request->accepts($contentTypes);
    }

    public function prefers($contentTypes)
    {
        $this->Request->prefers($contentTypes);
    }

    public function acceptsJson()
    {
        $this->Request->acceptsJson();
    }

    public function acceptsHtml()
    {
        $this->Request->acceptsHtml();
    }

    public function bearerToken()
    {
        $this->Request->bearerToken();
    }

    public function getContent($asResource = false)
    {
        $this->Request->getContent($asResource = false);
    }

    public function getRoute()
    {
        $this->Request->getRoute();
    }

    public function setRoute($route)
    {
        $this->Request->setRoute($route);
    }

    public function toArray()
    {
        $this->Request->toArray();
    }
}