<?php

namespace Cms\Controller;

use Engine\Controller;

class CmsController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);//у нашего контроллера абстрактного есть контроллер и мы его наследуем для повторного использования
    }

    public function header()
    {

    }
}