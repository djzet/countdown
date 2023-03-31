<?php

namespace Engine\Core\Config;

use Exception;

class Config
{
    /**
     * @throws Exception
     */
    public static function item($key, $group = 'items')
    {
        $groupItems = static::file($group);

        return $groupItems[$key] ?? null;
    }

    /**
     * @throws Exception
     */
    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';

        if (file_exists($path))
        {
            $items = require_once $path;

            if (is_array($items))
            {
                return $items;
            }
            else
            {
                throw new Exception(sprintf('Config file "%s" is not valid array.', $path));
            }
        }
        else
        {
            throw new Exception(sprintf('Cannot load config from file, file "%s" does not exist.', $path));
        }
        return false;
    }
}