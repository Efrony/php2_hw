<?php


namespace app\model;

use app\engine\Db;
use app\engine\Session;

abstract class Model
{
    public $id;
    public $changedProperties = [];


    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
    public function __set($property, $value)
    {
        if (property_exists($this, $property) && $property !== 'id') {
                $this->$property = $value;
                $this->changedProperties[] = $property;
        }
    }
}
