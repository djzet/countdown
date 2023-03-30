<?php
// Dependency injection - Внедрение зависимости
namespace Engine\DI;

class DI
{
    private array $container = []; // сюда сохраняем все зависимости и отсюда их берём
    public function set($key, $value): static // устанавливает зависимость
    {
        $this->container[$key] = $value;

        return $this;
    }
    public function get($key) // получает зависимость
    {
        return $this->has($key);
    }
    public function has($key)// для проверки наличия ключа
    {
        return $this->container[$key] ?? null;
    }
}