<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected DI $di;
    protected $db;
    protected mixed $view;
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
    }
}