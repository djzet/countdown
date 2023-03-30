<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
    private $controller;
    private mixed $parameters;
    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getParameters(): mixed
    {
        return $this->parameters;
    }
}