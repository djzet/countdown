<?php

namespace Engine\Core\Template;

use Exception;

class Theme
{
    const RULES_NAME_FILE =
        [
            'header'  => 'header-%s',
            'footer'  => 'footer-%s',
            'sidebar' => 'sidebar-%s',
        ];
    public string $url = '';
    protected array $data = [];
    /**
     * @throws Exception
     */
    public function header($name = null): void
    {
        $name = (string) $name;
        $file = 'header';
        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @throws Exception
     */
    public function footer($name = ''): void
    {
        $name = (string) $name;
        $file = 'footer';
        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @throws Exception
     */
    public function sidebar($name = ''): void
    {
        $name = (string) $name;
        $file = 'sidebar';
        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @throws Exception
     */
    public function block($name = '', $data = []): void
    {
        $name = (string) $name;

        if($name !== '')
        {
            $this->loadTemplateFile($name, $data);
        }
    }

    /**
     * @throws Exception
     */
    private function loadTemplateFile($nameFile, $data = []): void
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';

        if (is_file($templateFile))
        {
            extract($data);
            require_once $templateFile;
        }
        else
        {
            throw new Exception(sprintf('View file "$s" does not exist!', $templateFile));
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}