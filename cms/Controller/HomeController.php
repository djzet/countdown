<?php

namespace Cms\Controller;

use Engine\Controller;

class HomeController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);//у нашего контроллера абстрактного есть контроллер и мы его наследуем для повторного использования
    }

    public function index()
    {
        echo 'Index page';
    }
    public function news()
    {
        echo 'News page';
    }
}