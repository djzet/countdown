<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use JetBrains\PhpStorm\NoReturn;

class AdminController extends Controller
{
    protected Auth $auth;

    public function __construct($di)
    {
        parent::__construct($di);//у нашего контроллера абстрактного есть контроллер и мы его наследуем для повторного использования

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
            header('Location: /admin/login');
            exit();
        }
    }

    public function checkAuthorization()
    {

    }
    #[NoReturn] public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login');
        exit();
    }
}