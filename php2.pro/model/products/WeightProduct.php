<?php

namespace app\model\products;

use app\model\Products;

class WeightProduct extends Products
{
    public $weight;
    public static $sumWeightProducts = 0;

    public function __construct(int $id, string $name, array $discription, int $price, string $brand, $weight)
    {
        parent::__construct($id, $name, $discription, $price, $brand);
        $this->weight = $weight;
        self::$summ += $this->price * $this->weight;
        static::$sumWeightProducts += $this->price;
    }

    public function getSumWeightProducts() {
        return static::$sumWeightProducts;
    }

}
