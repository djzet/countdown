<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected DI $di;
    protected $db;
    protected mixed $view;
    protected mixed $config;
    protected mixed $request;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
    }
}