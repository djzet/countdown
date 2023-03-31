<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
use Exception;

class Provider extends AbstractProvider
{
    public string $serviceName = 'config';

    /**
     * @throws Exception
     */
    public function init()
    {
        $config['main'] = Config::file('main');
        //$config['database'] = Config::file('database');

        $this->di->set($this->serviceName, $config);
    }
}