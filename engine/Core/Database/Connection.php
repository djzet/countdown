<?php

namespace Engine\Core\Database;
use Exception;
use PDO;
use Engine\Core\Config\Config;

class Connection
{
    private $link;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @throws Exception
     */
    private function connect(): void
    {
        $config = Config::file('database');

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