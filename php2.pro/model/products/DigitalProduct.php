<?php

namespace app\model\products;

use app\model\Products;

class DigitalProduct extends Products
{
    public static $sumDigitalProducts = 0;

    public function __construct(int $id, string $name, array $discription, int $price, string $brand)
    {
        parent::__construct($id, $name, $discription, $price, $brand);
        $this->price *= 0.5 ;
        self::$summ += $this->price;
        static::$sumDigitalProducts += $this->price;
    }

    public function getSumDigitalProducts() {
        return static::$sumDigitalProducts;
    }
}
