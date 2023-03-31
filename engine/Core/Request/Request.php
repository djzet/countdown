<?php

namespace Engine\Core\Request;

class Request
{
    public array $get = [];
    public array $post = [];
    public array $request = [];
    public array $cookie = [];
    public array $files = [];
    public array $server = [];
    public function __construct()
    {
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->request = $_REQUEST;
        $this->cookie  = $_COOKIE;
        $this->files   = $_FILES;
        $this->server  = $_SERVER;
    }
}