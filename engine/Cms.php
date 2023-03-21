<?php
// запускает все приложение - точка запуска приложения
namespace Engine;
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
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/product/{id}', 'ProductController:index');
        print_r($this->di);
    }
}