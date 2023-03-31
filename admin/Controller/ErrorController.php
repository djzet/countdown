<?php

namespace Admin\Controller;

use Cms\Controller\CmsController;

class ErrorController extends AdminController
{
    public function page404()
    {
        echo '404 Page';
    }
}