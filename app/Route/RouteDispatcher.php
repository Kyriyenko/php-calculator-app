<?php

namespace app\Route;

use App\Route\RouteConfiguration as RouteConfiguration;

class RouteDispatcher
{

    private RouteConfiguration $routeConfiguration;
    private string $requestUri = '/';
    private array $paramMap = [];
    private array $paramRequestMap = [];

    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process(): void
    {
        $this->saveRequestUri();
        $this->setParamsMap();
        $this->makeRegexRequest();
        $this->run();
    }

    private function saveRequestUri(): void
    {
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
            $this->routeConfiguration->route = $this->clean($this->routeConfiguration->route);
        }
    }

    private function clean(string $str): string
    {
        return preg_replace('/(^\/)|(\/$)/', '', $str);
    }

    private function setParamsMap(): void
    {
        $routeArray = explode('/', $this->routeConfiguration->route);

        foreach ($routeArray as $key => $param) {
            if (preg_match('/{.*}/', $param)) {
                $this->paramMap[$key] = preg_replace('/(^{)|(}$)/', '', $param);
            }
        }
    }

    private function makeRegexRequest(): void
    {
        $requestUriArray = explode('/', $this->requestUri);

        foreach ($this->paramMap as $key => $param) {
            if (!isset($requestUriArray[$key])) return;

            $this->paramRequestMap[$param] = $requestUriArray[$key];
            $requestUriArray[$key] = '{.*}';
        }

        $this->requestUri = implode('/', $requestUriArray);
        $this->prepareRegex();
    }

    private function prepareRegex(): void
    {
        $this->requestUri = str_replace('/', '\/', $this->requestUri);
    }

    private function run(): void
    {
        if (preg_match("/$this->requestUri/", $this->routeConfiguration->route)) {
            $this->render();
        }
    }

    private function render(): void
    {
        $className = $this->routeConfiguration->controller;
        $action = $this->routeConfiguration->action;

        (new $className)->$action(...$this->paramRequestMap);
    }
}