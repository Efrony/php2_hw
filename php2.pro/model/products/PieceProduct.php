<?php

namespace app\model\products;

use app\model\Products;

class PieceProduct extends Products
{
    public static $sumPieceProducts = 0;

    public function __construct(int $id, string $name, array $discription, int $price, string $brand)
    {
        parent::__construct($id, $name, $discription, $price, $brand);
        self::$summ += $this->price ;
        static::$sumPieceProducts += $this->price;
    }

    public function getSumPieceProducts() {
        return static::$sumPieceProducts;
    }
}
