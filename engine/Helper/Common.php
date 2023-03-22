<?php

namespace Engine\Helper;

class Common
{
// функция которая проверяет какой метод POST или GET
    /**
     * @return bool
     */
    function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    static function getmethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return mixed|string
     */
    static function getPathUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if ($position = strpos($pathUrl, '?'))
        {
            $pathUrl = substr($pathUrl, 0, $position); //обрезаем полученное значение с 0-го символа - с начала до ?
        }
        return $pathUrl;
    }
}