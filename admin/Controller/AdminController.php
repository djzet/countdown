<?php

namespace Admin\Controller;

use Engine\Controller;

class AdminController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);//у нашего контроллера абстрактного есть контроллер и мы его наследуем для повторного использования
    }
}