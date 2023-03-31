<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    protected Auth $auth;
    public function __construct($di)
    {
        parent::__construct($di);//у нашего контроллера абстрактного есть контроллер и мы его наследуем для повторного использования

        $this->auth = new Auth();

        $this->checkAuthorization();
    }
    public function checkAuthorization()
    {
        if (!$this->auth->authorized())//редирект
        {
            header('Location: /admin/login', true, 301);
            exit();
        }
    }
}