<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    /**
     * @var string[]
     */
    private $methods =
        [
            'GET',
            'POST',
        ];
    /**
     * @var array[]
     */
    private $routes =
        [
            'GET'  => [],
            'POST' => [],
        ];
    /**
     * @var string[]
     */
    private $patterns =
        [
            'int' => '[0-9]+',
            'str'=>'[a-zA-Z\.\-_%]+',
            'any'=>'[a-zA-Z0-9\.\-_%]+',
        ];

    /**
     * @param $key
     * @param $pattern
     * @return void
     */
    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array
     */
    private function routes($method)
    {
        return $this->routes[$method] ?? [];
    }

    /**
     * @param $method
     * @param $pattern
     * @param $controller
     * @return void
     */
    public function register($method, $pattern, $controller) // регистрирует наши роуты
    {
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute|null
     */
    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));
        if (array_key_exists($uri, $routes))
        {
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }
    private function doDispatch($method, $uri)
    {
        foreach ($this->routes($method) as $route => $controller)
        {
            $pattern = '#^'.$route.'$#s';

            if (preg_match($pattern, $uri, $parameters))
            {
                return new DispatchedRoute($controller, $parameters);
            }
        }
    }
}