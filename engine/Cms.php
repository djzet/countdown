<?php
// запускает все приложение - точка запуска приложения
namespace Engine;
use Engine\Helper\Common;
class Cms
{
    /**
     * @var
     */
    private $di; // cоздаем переменную

    public $router;

    /**
     * @param $di
     */
    public function __construct($di) // сюда передаются все зависимости
    {
        $this->di = $di;
        $this->router = $this->di->get('router');//записали зависимость роутер в переменную роутер
    }

    /**
     * @return void
     */
    public function run()// запуск приложения CMS
    {
        $this->router->add('home', '/', 'HomeController:index');// пример создания роутера
        $this->router->add('news', '/news', 'HomeController:news');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

        list($class, $action) = explode(':', $routerDispatch->getController(), 2);//разбивает массив по разделителю

        $controller = '\\Cms\\Controller\\'.$class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

        //print_r($routerDispatch);
    }
}