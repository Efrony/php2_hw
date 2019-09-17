<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db
{
    use Tsingletone;
    
    private $connection = null;
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'database' => 'shop',
        'opt' => [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // fetch(PDO::FETCH_ASSOC)) fetch(PDO::FETCH_LAZY))
            // \PDO::ATTR_EMULATE_PREPARES   => false, отключение режима эмуляции
        ]
    ];

    private function getDSN()
    {
        $driver = $this->config['driver'];
        $host = $this->config['host'];
        $db =  $this->config['database'];
        $charset = $this->config['charset'];
        $dsn = "$driver:host=$host;dbname=$db;charset=$charset";
        return $dsn;
    }

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $dsn = $this->getDSN();
            $user = $this->config['login'];
            $pass = $this->config['password'];
            $opt = $this->config['opt'];

            $this->connection = new \PDO($dsn, $user, $pass, $opt);
        }
        return $this->connection;
    }

    private function query($sql, $params)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function executeQuery($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryObject($sql, $params, $class)
    {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetch();
    }

    public function queryColumn($sql, $params)
    {
        return $this->query($sql, $params)->fetchAll(\PDO::FETCH_COLUMN);
    }
    
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

}
