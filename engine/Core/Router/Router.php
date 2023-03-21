<?php

namespace Engine\Core\Router;

class Router
{
    private $roites = [];//хранит список всех route
    private $host;
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param $method
     * @return void
     */
    public function add($key, $pattern, $controller, $method = 'GET') //добавляем роуты
    {
        $this->roites[$key] =
            [
                'pattern'    => $pattern,
                'controller' => $controller,
                'method'     => $method
            ];
    }
}