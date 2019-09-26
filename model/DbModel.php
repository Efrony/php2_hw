<?php


namespace app\model;

use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getNameTable();

    public static function getOne($id)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }


    public static function getAll()
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }


    public static function getLimit(int $from, int $to)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName} ORDER BY `rating` DESC LIMIT {$from}, {$to}";
        return Db::getInstance()->queryAll($sql);
    }


    public static function getObjectWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryObject($sql, ['point'=> $point], static::class);
        return $data;
    }


    public static function getWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryAll($sql, ['point' => $point]);
        return $data;
    }

    public static function getOneWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryOne($sql, ['point' => $point]);
        return $data;
    }



    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key=>$value) {
            if ($key == 'id' || $key == 'changedProperties') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(', ', $columns); // `name`, `rating`, `color`, `discription`, `price`, `img_id`
        $values = implode(', ', array_keys($params)); //:name, :rating, :color, :discription, :price, :img_id
        $tableName = static::getNameTable();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->executeQuery($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }


    public function update()
    {   
        $string = '';
        $params = [];

        foreach ($this as $key=>$value) {
            if (in_array($key, $this->changedProperties)) {
                $string .= "`{$key}` = :{$key}, ";
                $params[$key] = $value;
            }
        }
        $string = substr($string, 0, -2); // убираем в конце пробел и запятую
        $tableName = static::getNameTable();
        $sql = "UPDATE {$tableName} SET {$string} WHERE (`id` = :id);";
        $params['id'] = $this->id;
        $this->changedProperties = [];

        return Db::getInstance()->executeQuery($sql, $params);
    }


    public function delete()
    {
        $tableName = static::getNameTable();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->executeQuery($sql, ['id' => $this->id]);
    }


    public function save() {
        if (is_null($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }
}
