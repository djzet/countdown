<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    public string $serviceName = 'router';

    public function init()
    {
        $router = new Router('http://countdown.com/');

        $this->di->set($this->serviceName, $router);
    }
}