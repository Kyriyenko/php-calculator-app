<?php

namespace app\Route;

use App\Route\RouteConfiguration as RouteConfiguration;

class Route
{
    private static array $routesGet = [];
    private static array $routesPost = [];

    public static function get(string $route, array $controller): RouteConfiguration
    {
        $routeConfiguration = new RouteConfiguration($route, $controller[0], $controller[1]);
        self::$routesGet[] = $routeConfiguration;

        return $routeConfiguration;
    }

    public static function post(string $route, array $controller): RouteConfiguration
    {
        $routeConfiguration = new RouteConfiguration($route, $controller[0], $controller[1]);
        self::$routesPost[] = $routeConfiguration;

        return $routeConfiguration;
    }

    public static function getRoutesGet(): array
    {
        return self::$routesGet;
    }

    public static function getRoutesPost(): array
    {
        return self::$routesPost;
    }

    public static function redirect(string $url, array $params = []): void
    {
        header('Location: ' . $url);
    }
}