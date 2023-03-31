<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'Tur'];
        $this->view->render('index', $data);
    }

    public function news($id)
    {
        echo $id;
    }
}