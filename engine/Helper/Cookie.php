<?php
//для работы с cookie
namespace Engine\Helper;

class Cookie
{
    /**
     * @param $key
     * @param $value
     * @param $time
     * @return void
     */
    public static function set($key, $value, $time = 7200) //для добавления
    {
        setcookie($key, $value, time() + $time, '/');
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public static function get($key) //для получения
    {
        if (isset($_COOKIE[$key]))
        {
            return$_COOKIE[$key];
        }
        return null;
    }
    public static function delete($key)//для удаления
    {
        if (isset($_COOKIE[$key]))
        {
            self::set($key,'', -7200);
            unset($_COOKIE[$key]);
        }
    }
}