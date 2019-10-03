<?php


namespace app\model;

use app\interfaces\IModel;
use app\engine\Session;

abstract class Model implements IModel
{
    protected $id;
    protected $id_session;
    protected $changedProperties = [];
    

    public function __construct()
    {
        $this->id_session = (new Session)->getSession();
    }

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
