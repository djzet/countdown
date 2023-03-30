<?php

namespace Engine\Helper;

class Common
{
    function isPost(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }
    static function getMethod()//получает метод
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    static function getPathUrl()//получает путь
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if ($position = strpos($pathUrl, '?'))//обрезаем с начала строки до этого символа
        {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }
}