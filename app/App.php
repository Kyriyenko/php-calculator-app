<?php

namespace app;

use App\Route\Route as Route;
use App\Route\RouteDispatcher as RouteDispatcher;

class App
{
    public static function run(): void
    {
        $requestMethod = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $methodName = 'getRoutes' . $requestMethod;

        foreach (Route::$methodName() as $getRoutesConf) {
            $routeDispatcher = new RouteDispatcher($getRoutesConf);
            $routeDispatcher->process();
        }
    }
}