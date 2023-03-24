<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
use Exception;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'config';

    /**
     * @return mixed|void
     * @throws Exception
     */
    public function init()
    {
        $config['main'] = (new \Engine\Core\Config\Config)->file('main');
        $config['database'] = (new \Engine\Core\Config\Config)->file('database');

        $this->di->set($this->serviceName, $config);
    }
}