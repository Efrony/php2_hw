<?php


namespace app\model;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $id;
    protected $changedProperties = [];

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
