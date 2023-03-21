<?php

namespace Engine\Core\Database;
use \PDO;
class Connection
{
    /**
     * @var
     */
    private $link; //сохранения соединения с БД

    public function __construct() // работает при создание экземпляра класса
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect() //непостредственно устанавливает соединение с БД
    {
        $config = require_once 'config.php';//подключаем конфиг

        $dsn = 'mysql:host='.$config['host'].';db_name='.$config['db_name'].';charset='.$config['charset'].';';

        $this->link = new PDO($dsn, $config['username'], $config['password']);//$dsn - содержит инфу для подключения к БД, $username- имя user, $password - пароль user

        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql) //принимает sql запрос и выполняет его
    {
        $sth = $this->link->prepare($sql);//запись индификатора запроса
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql) //принимает sql запрос и выполняет его
    {
        $exe = $this->execute($sql);
        $result = $exe->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false)
        {
            return [];
        }
        return $result;
    }
}
