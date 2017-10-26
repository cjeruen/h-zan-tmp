<?php

namespace Zan\Framework\Network\Http\Routing;

use ZanPHP\HttpFoundation\Request\Request;

interface IRouter
{
    /*
     * @return array ['module', 'controller', 'action', 'params']
     */
    public function dispatch(Request $request);
}
