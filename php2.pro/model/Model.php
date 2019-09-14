<?php


namespace app\model;


use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;
    protected $nameTable = '';

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    abstract public function getNameTable();

    public function getOneFromDb($id)
    {
        $sql = "SELECT * FROM {$this->getNameTable()} WHERE id = {$id}";
        var_dump($sql);
        return $this->db->queryOne($sql) ;
    }

    public function getAllFromDb()
    {
        $sql = "SELECT * FROM {$this->getNameTable()}";
        var_dump($sql);
        return $this->db->queryAll($sql) ;
    }
}