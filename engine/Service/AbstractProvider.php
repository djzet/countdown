<?php

namespace Engine\Service;
use Engine\DI\DI;

abstract class AbstractProvider
{
    /**
     * @var\Engine\DI\DI;
     */
    protected $di; //хранит экземпляр класса DI


    /**
     * @param DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init(); // должен содержать реализацию этого метода - инициализация нового сервиса
}