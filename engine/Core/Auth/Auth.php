<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;
class Auth
{
    protected bool $authorized = false;

    protected $user;
    public function authorized(): bool
    {
        return $this->authorized;
    }
    public function user()
    {
        return $this->user;
    }
    public function authorize($user): void
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);

        $this->authorized = true;
        $this->user       = $user;
    }
    public function unAuthorize(): void
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

        $this->authorized = false;
        $this->user       = null;
    }
    public static function salt(): string
    {
        return (string) rand(10000000, 99999999);
    }
    public static function encryptPassword($password, $salt = ''): string
    {
        return hash('sha256', $password . $salt);
    }
}