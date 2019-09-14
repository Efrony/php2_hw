<?php

namespace app\model;
use app\engine\Db;

abstract class Products extends Model {
    public $id;
    public $name;
    public $discription;
    public $price;
    public $brand;
    protected static $summ = 0;

    public function __construct(int $id, string $name, array $discription, int $price, string $brand)
    {   
        parent::__construct(new Db);
        $this->id = $id;
        $this->name = $name;
        $this->discription = $discription;
        $this->price = $price;
        $this->brand = $brand;
        $this->summ = 0;
    }

    public function getSummPrice()
    {
        return self::$summ;
    }

    public function getNameTable()
    {
        return 'products';
    }


}


