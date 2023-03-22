<?php

namespace Engine\Core\Router;

class Router
{
    private $roites = [];//хранит список всех route
    private $host;
    private $dispatcher;
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

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute|null
     */
    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {
        if ($this->dispatcher == null)
        {
            $this->dispatcher = new UrlDispatcher();

            foreach ($this->roites as $route)
            {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        return $this->dispatcher;
    }
}