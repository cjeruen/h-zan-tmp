<?php

namespace ZanPHP\TcpServer\ServerStart;

use ZanPHP\Contracts\Config\ConfigLoader;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\ServerBase\Middleware\MiddlewareInitiator;

class InitializeMiddleware
{
    private $zanFilters = [];

    private $zanTerminators = [];

    /**
     * @param $server
     */
    public function bootstrap($server)
    {
        $repository = make(Repository::class);
        $middlewarePath = $repository->get('path.middleware');
        if (!is_dir($middlewarePath)) {
            return;
        }
        $middlewareInitiator = MiddlewareInitiator::getInstance();
        $configLoader = make(ConfigLoader::class);
        $configs = $configLoader->load($middlewarePath);
        $middlewareConfig = isset($configs['middleware']) ? $configs['middleware'] : [];
        $middlewareConfig = is_array($middlewareConfig) ? $middlewareConfig : [];
        $middlewareInitiator->initConfig($middlewareConfig);
        $exceptionHandlerConfig = isset($configs['exceptionHandler']) ? $configs['exceptionHandler'] : [];
        $exceptionHandlerConfig = is_array($exceptionHandlerConfig) ? $exceptionHandlerConfig : [];
        $middlewareInitiator->initExceptionHandlerConfig($exceptionHandlerConfig);
        $middlewareInitiator->initZanFilters($this->zanFilters);
        $middlewareInitiator->initZanTerminators($this->zanTerminators);
    }
}
