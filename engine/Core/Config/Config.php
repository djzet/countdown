<?php
// получаем доступ к конфигам
namespace Engine\Core\Config;

class Config
{
    /**
     * @param $key
     * @param $group
     * @return mixed|null
     * @throws \Exception
     */
    public static function item($key, $group = 'main')
    {
        $groupItems = (new Config)->file($group);

        return $groupItems[$key] ?? null;
    }


    /**
     * @param $group
     * @return array
     * @throws \Exception
     */
    public function file($group) // group - название конфига
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/'.mb_strtolower(ENV).'/Config/'.$group.'.php';

        if (file_exists($path))
        {
            $items = require_once $path;
            if ($items)
            {
                return $items;
            }
            else
            {
                throw new \Exception(sprintf('Config file <strong>%s</strong> is not a valid array.', $path));
            }
        }
        else
        {
            throw new \Exception(sprintf('Cannot load config from file, file <strong>%s</strong> does not exist.', $path));
        }

        return false;
    }
}