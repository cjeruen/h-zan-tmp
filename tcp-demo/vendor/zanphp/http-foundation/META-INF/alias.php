<?php

return [
    \ZanPHP\HttpFoundation\Bag\FileBag::class => "Zan\\Framework\\Network\\Http\\Bag\\FileBag",
    \ZanPHP\HttpFoundation\Bag\HeaderBag::class => "Zan\\Framework\\Network\\Http\\Bag\\HeaderBag",
    \ZanPHP\HttpFoundation\Bag\ParameterBag::class => "Zan\\Framework\\Network\\Http\\Bag\\ParameterBag",
    \ZanPHP\HttpFoundation\Bag\ServerBag::class => "Zan\\Framework\\Network\\Http\\Bag\\ServerBag",

    \ZanPHP\HttpFoundation\Exception\Handler\InternalErrorHandler::class => "Zan\\Framework\\Network\\Http\\Exception\\Handler\\InternalErrorHandler",
    \ZanPHP\HttpFoundation\Exception\Handler\InvalidRouteHandler::class => "Zan\\Framework\\Network\\Http\\Exception\\Handler\\InvalidRouteHandler",
    \ZanPHP\HttpFoundation\Exception\Handler\PageNotFoundHandler::class => "Zan\\Framework\\Network\\Http\\Exception\\Handler\\PageNotFoundHandler",
    \ZanPHP\HttpFoundation\Exception\Handler\RedirectHandler::class => "Zan\\Framework\\Network\\Http\\Exception\\Handler\\RedirectHandler",
    \ZanPHP\HttpFoundation\Exception\Handler\ServerUnavailableHandler::class => "Zan\\Framework\\Network\\Http\\Exception\\Handler\\ServerUnavailableHandler",

    \ZanPHP\HttpFoundation\Exception\BadRequestException::class => "Zan\\Framework\\Network\\Http\\Exception\\BadRequestException",
    \ZanPHP\HttpFoundation\Exception\InvalidRouteException::class => "Zan\\Framework\\Network\\Http\\Exception\\InvalidRouteException",
    \ZanPHP\HttpFoundation\Exception\PageNotFoundException::class => "Zan\\Framework\\Network\\Http\\Exception\\PageNotFoundException",
    \ZanPHP\HttpFoundation\Exception\RedirectException::class => "Zan\\Framework\\Network\\Http\\Exception\\RedirectException",
    \ZanPHP\HttpFoundation\Exception\RouteCheckFailedException::class => "Zan\\Framework\\Network\\Http\\Exception\\RouteCheckFailedException",

    \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeader::class => "Zan\\Framework\\Network\\Http\\Request\\AcceptHeader\\AcceptHeader",
    \ZanPHP\HttpFoundation\Request\AcceptHeader\AcceptHeaderItem::class => "Zan\\Framework\\Network\\Http\\Request\\AcceptHeader\\AcceptHeaderItem",

    \ZanPHP\HttpFoundation\Request\BaseRequest::class => "Zan\\Framework\\Network\\Http\\Request\\BaseRequest",
    \ZanPHP\HttpFoundation\Request\Request::class => "Zan\\Framework\\Network\\Http\\Request\\Request",

    \ZanPHP\HttpFoundation\Response\BaseJsonResponse::class => "Zan\\Framework\\Network\\Http\\Response\\BaseJsonResponse",
    \ZanPHP\HttpFoundation\Response\BaseRedirectResponse::class => "Zan\\Framework\\Network\\Http\\Response\\BaseRedirectResponse",
    \ZanPHP\HttpFoundation\Response\BaseResponse::class => "Zan\\Framework\\Network\\Http\\Response\\BaseResponse",

    \ZanPHP\HttpFoundation\Response\Cookie::class => "Zan\\Framework\\Network\\Http\\Response\\Cookie",
    \ZanPHP\HttpFoundation\Response\InternalErrorResponse::class => "Zan\\Framework\\Network\\Http\\Response\\InternalErrorResponse",
    \ZanPHP\HttpFoundation\Response\JsonResponse::class => "Zan\\Framework\\Network\\Http\\Response\\JsonResponse",
    \ZanPHP\HttpFoundation\Response\RedirectResponse::class => "Zan\\Framework\\Network\\Http\\Response\\RedirectResponse",
    \ZanPHP\HttpFoundation\Response\Response::class => "Zan\\Framework\\Network\\Http\\Response\\Response",
    \ZanPHP\HttpFoundation\Response\ResponseHeaderBag::class => "Zan\\Framework\\Network\\Http\\Response\\ResponseHeaderBag",

    \ZanPHP\HttpFoundation\Cookie::class => "\\Zan\\Framework\\Network\\Http\\Cookie",

];