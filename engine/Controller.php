<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected DI $di;
    protected $db;
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}