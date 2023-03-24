<?php

namespace Engine\Core\Auth;
use Engine\Core\Config\Config;
use Engine\Helper\Cookie;
class Auth implements AuthInterface
{
    protected $authorized = false;
    protected $hash_user;

    /**
     * @return bool|mixed
     */
    public function authorized()//записываем авторизацию
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function hashUser()//записываем пользователя
    {
        return Cookie::get('auth_user');
    }

    /**
     * @param $user
     * @return void
     */
    public function authorize($user)//сохраняем в куки
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);

        $this->authorized = true;
        $this->hash_user = $user;
    }

    /**
     * @return void
     */
    public function unAuthorize()//удаляем из куки
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

        $this->authorized = false;
        $this->hash_user = null;
    }

    /**
     * @return string
     */
    public static function salt()//хеш для пароля чтобы избежать повторения для безопасности
    {
        return (string) rand(10000000, 99999999);
    }

    /**
     * @param $password
     * @param $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')//создание хеша пароля
    {
        return hash('sha256', $password.$salt);
    }
}