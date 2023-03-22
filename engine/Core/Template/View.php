<?php

namespace Engine\Core\Template;

class View
{
    public function __construct()
    {

    }

    /**
     * @param $template
     * @param $vars
     * @return void
     */
    public function render($template, $vars = [])
    {
        $templatePath = ROOT_DIR.'/content/themes/default/'.$template.'.php';

        if (!is_file($templatePath))
        {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }

        extract($vars);

        ob_start();//буферезация используется при рендере
        ob_implicit_flush(0);//отключаем явную очистку

        try
        {
            require $templatePath;
        }
        catch (\Exception $e)
        {
            ob_end_clean();//очищает буфер
            throw $e;
        }

        echo ob_get_clean();//функция получает содержимое текущего буфера и очищает после вывода
    }
}