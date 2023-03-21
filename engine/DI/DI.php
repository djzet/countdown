<?php
// DI - dependency injection - для внедрения зависимостей в наше систему
namespace Engine\DI; //пространство имён , \Engine\DI\DI() - создание экземпляра класса, use \Engine\DI\DI - подключение класса

class DI // класс DI
{
    /**
     * @var array
     */
    private $container = []; // суда сохраняем все зависимости и получаем их

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value) // добавляет зависимость в контеинер, принимает 2 параметра - ключ и значение
    {
        $this->container[$key] = $value; // устанавливаем значение по переданному ключу
        return $this; // возвращяем это значение
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key) // возвращает с контеинера какую либо зависимость
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function has($key)//проверка есть-ли ключ
    {
        return $this->container[$key] ?? null;
    }
}