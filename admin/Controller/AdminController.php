<?php

namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;
class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;


    /**
     * @param $di
     */
    public function  __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        $this->checkAuthorization();
        exit();
    }

    /**
     * @return void
     */
    public function checkAuthorization()
    {
        if ($this->auth->hashUser() !== null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }

        if (!$this->auth->authorized())
        {
            header('Location: /admin/login', true, 301);
            exit();
        }
    }
}