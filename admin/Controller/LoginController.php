<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller
{
    protected $auth;
    /**
     * @param DI $di
     */
    public function  __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }

        if ($this->auth->authorized())
        {
            header('Location: /admin/', true, 301);
            exit();
        }
    }

    /**
     * @return void
     */
    public function form()
    {
        $this->auth->authorize('admin');
        if ($this->auth->authorized())
        {
            print_r($_COOKIE);
        }
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;
        print_r($this->db);
        $query = $this->db->query('
        select *
        from user
        where email = "'.$params['email'].'"
        and password = "'.md5($params['password']).'"
        LIMIT 1
        ');

        if (!empty($query))
        {
            $user = $query[0];

            if ($user['role'] == 'admin')
            {
                $hash = md5($user['id'].$user['email'].$user['password'].$this->auth->salt());

                $this->db->query('
                update user
                set hash = "'.$hash.'"
                where id = "'.$user['id'].'"
                ');

                $this->auth->authorize($hash);

                header('Location: /admin/login/', true, 301);
            }
        }
        else{
            echo 'Error';
        }
    }
}