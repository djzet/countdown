<?php

namespace Engine\Core\Router;

class Router
{
    private array $routes = []; //хранит список всех роутев
    private $host;
    public function __construct($host)
    {
        $this->host = $host;
    }

    public function add($key, $pattern, $controller, $method = 'GET'): void// добавляем роуты
    {
        $this->routes[$key] =
            [
                'pattern'    => $pattern,
                'controller' => $controller,
                'method'     => $method,
            ];
    }
}