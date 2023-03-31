<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    private array $method =
        [
            'GET',
            'POST'
        ];//хранить массив с типами методов
    private array $routes =
        [
          'GET'  => [],
          'POST' => []
        ];
    private array $patterns =
        [
            'int' => '[0-9]+',
            'str' => '[a-zA-Z\.\-_%]+',
            'any' => '[a-zA-Z0-9\.\-_%]+'
        ];
    public function addPattern($key, $pattern): void//функция добавления патерна
    {
        $this->patterns[$key] = $pattern;
    }
    private function routes($method)//проверка существование роутера
    {
        return $this->routes[$method] ?? [];
    }
    public function register($method, $pattern, $controller): void//регистрирует наши роуты
    {
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }
    private function convertPattern($pattern)
    {
        if (!str_contains($pattern, '('))//ищет совпадение в строке
        {
            return $pattern;
        }
        return preg_replace_callback(pattern: '#\((\w+):(\w+)\)#', callback: [$this, 'replacePattern'], subject: $pattern);
    }
    private function replacePattern($matches): string
    {
        return '(?<' .$matches[1]. '>' .strtr($matches[2], $this->patterns). ')';
    }
    private function processParam($parameters)
    {
        foreach ($parameters as $key => $value)
        {
            if (is_int($key))
            {
                unset($parameters[$key]);
            }
        }
        return $parameters;
    }
    public function dispatch($method, $uri): ?DispatchedRoute
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes))
        {
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }
    private function doDispatch($method, $uri): ?DispatchedRoute
    {
        foreach ($this->routes($method) as $route => $controller)
        {
            $pattern = sprintf("#^%s\$#s", $route);

            if (preg_match($pattern, $uri, $parameters))
            {
                return new DispatchedRoute($controller,  $this->processParam($parameters));
            }
        }
        return null;
    }
}