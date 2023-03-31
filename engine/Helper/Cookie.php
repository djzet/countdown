<?php

namespace Engine\Helper;

class Cookie
{
    public static function set($key, $value, $time = 31536000): void
    {
        setcookie($key, $value, time() + $time, '/');
    }
    public static function get($key)
    {
        return $_COOKIE[$key] ?? null;
    }
    public static function delete($key): void
    {
        if (isset($_COOKIE[$key]))
        {
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}