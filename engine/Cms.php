<?php
// принимаеть в себя DI контеинер
namespace Engine;

use Engine\Helper\Common;
class Cms
{
    private $di;
    public $router;
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }
    public function run(): void
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('news', '/news', 'HomeController:news');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

        list($class, $action) = explode(':', $routerDispatch->getController(), 2);//explode - из строки создает массив

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

        //print_r($routerDispatch);
    }
}