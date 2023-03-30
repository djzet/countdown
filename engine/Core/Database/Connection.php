<?php

namespace Engine\Core\Database;
use PDO;

class Connection
{
    private $link;
    public function __construct()
    {
        $this->connect();
    }
    private function connect(): void
    {
        $config =
                [
                    'host' => 'localhost',
                    'db_name' => 'cms',
                    'username' => 'root',
                    'password' => '',
                ];

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';';

        $this->link = new PDO($dsn, $config['username'], $config['password']);

    }
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false)
        {
            return [];
        }

        return $result;
    }
}