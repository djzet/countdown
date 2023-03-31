<?php

namespace Engine\Service\Request;

use Engine\Core\Request\Request;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public string $serverName = 'request';

    public function init()
    {
        $request = new Request();

        $this->di->set($this->serverName, $request);
    }
}