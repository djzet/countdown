<?php
// хранить пути поддключения сервисов
//автоматически сервис передается в di контеинер где мы можем его получить в контролере

return
    [
        Engine\Service\Database\Provider::class,
        Engine\Service\Router\Provider::class,
        Engine\Service\View\Provider::class,
        Engine\Service\Config\Provider::class,
        Engine\Service\Request\Provider::class,
    ];