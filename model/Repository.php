<?php


namespace app\model;

use app\engine\Db;
use app\model\entities\DataEntity;

abstract class Repository extends Model
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }


    public function getOne($id)
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }


    public function getAll()
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }


    public function getLimit(int $from, int $to)
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName} ORDER BY `rating` DESC LIMIT {$from}, {$to}";
        return $this->db->queryAll($sql);
    }


    public function getObjectWhere($condition, $point)
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = $this->db->queryObject($sql, ['point'=> $point],  $this->getEntityClass());
        return $data;
    }



    public function getWhere($condition, $point)
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = $this->db->queryAll($sql, ['point' => $point]);
        return $data;
    }


    
    public function getOneWhere($condition, $point)
    {
        $tableName = $this->getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = $this->db->queryOne($sql, ['point' => $point]);
        return $data;
    }

    public function getColumnWhere($column, $condition, $point) {
        $tableName = $this->getNameTable();
        $sql = "SELECT {$column} FROM {$tableName} WHERE {$condition} = :point";
        return $this->db->queryColumn($sql, ['point' => $point]);
    }


    public function insert(DataEntity $entity)
    {
        $params = [];
        $columns = [];
        foreach ($entity as $key=>$value) {
            if ($key == 'id' || $key == 'changedProperties') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(', ', $columns); // `name`, `rating`, `color`, `discription`, `price`, `img_id`
        $values = implode(', ', array_keys($params)); //:name, :rating, :color, :discription, :price, :img_id
        $tableName = $this->getNameTable();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        $this->db->executeQuery($sql, $params);

        $entity->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity)
    {   
        $string = '';
        $params = [];
        foreach ($entity as $key=>$value) {
          //  if (in_array($key, $entity->changedProperties)) {  !!! почему то свойсва перествли добавляться в changedProperties при изменении
            if ($key == 'id' || $key == 'changedProperties')    continue;
            $string .= "`{$key}` = :{$key}, ";
            $params[$key] = $value;
        }
        $string = substr($string, 0, -2); // убираем в конце пробел и запятую
        $tableName = $this->getNameTable();
        $sql = "UPDATE {$tableName} SET {$string} WHERE (`id` = :id);";
        $params['id'] = $entity->id;
        $entity->changedProperties = [];
        return $this->db->executeQuery($sql, $params);
    }


    public function delete($entity)
    {
        $tableName = $this->getNameTable();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->executeQuery($sql, ['id' => $entity->id]);
    }


    public function save(DataEntity $entity) {
        if (is_null($entity->id)){
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}
