<?php

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;
class View
{
    protected \Engine\Core\Template\Theme $theme;
    public function __construct()
    {
        $this->theme = new Theme();
    }
    public function render($template, $vars = []): void
    {
        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath))
        {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in "%s"', $template, $templatePath));
        }

        $this->theme->setData($vars);
        extract($vars);//из всех ключей создаст переменные

        ob_start();//включаем буфферизацию - используется при рендере
        ob_implicit_flush(0);//отключаем не явную очистку

        try
        {
            require_once $templatePath;
        }
        catch (\ErrorException $e)
        {
            ob_end_clean();//очистка буффера
            throw $e;
        }
        echo ob_get_clean();//получает содержимое текущего буффера
    }

    private function getTemplatePath($template, $env = null): string
    {
        if($env == 'Cms')
        {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return ROOT_DIR . '/View/' . $template . '.php';
    }
}