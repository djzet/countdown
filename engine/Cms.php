<?php
// запускает все приложение - точка запуска приложения
namespace Engine;
use Engine\Core\Router\DispatchedRoute;
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
        try
        {
            require_once __DIR__.'/../cms/Route.php'; //подключение route

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null)
            {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);//разбивает массив по разделителю

            $controller = '\\Cms\\Controller\\'.$class;
            $parameters =  $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        }
        catch (\Exception $e)
        {
            $e->getMessage();
            exit();
        }
    }
}