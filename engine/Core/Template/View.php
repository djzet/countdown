<?php

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

class View
{
    /**
     * @var Theme
     */
    protected $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }

    /**
     * @param $template
     * @param $vars
     * @return void
     */
    public function render($template, $vars = [])
    {
        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath))
        {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }

        $this->theme->setData($vars);
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

    /**
     * @param $template
     * @param $env
     * @return string
     */
    private function getTemplatePath($template, $env = null) //получает путь темплате пути в зависимости от окружения
    {
        if ($env === 'Cms')
        {
            return ROOT_DIR.'/content/themes/default/'.$template.'.php';
        }
        return ROOT_DIR.'/View/'.$template.'.php';
    }
}