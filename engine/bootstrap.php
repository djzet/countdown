<?php
//проверка для запуска приложения

require_once __DIR__.'/../vendor/autoload.php'; //подключаем auto loading

use Engine\Cms; // импорт класса Cms
use Engine\DI\DI; // импорт класса DI

try
{
    $di = new DI(); //создаем екземпляр класса DI
    // если создадим зависимость они попадут в Сms

    $services = require __DIR__.'/Config/Service.php'; //подключаем сервис

    foreach ($services as $service) //проходим по конфигу, при каждом проходе цикла в провайдера будет записываться новый сервис
    {
         $provider = new $service($di);
         $provider->init();
    }

    $cms = new Cms($di); //создаем екземпляр класса Cms
    $cms->run();//вызов функции run
}
catch (\ErrorException $e)// если исключение то выводим его
{
    echo $e->getMessage();
}
