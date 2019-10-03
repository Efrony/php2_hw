<?php

namespace app\model;

class Product extends DbModel
{
    protected $name;
    protected $rating;
    protected $color;
    protected $discription;
    protected $price;
    protected $img_id;

    public function __construct(
        $name = null,
        $rating = null,
        $color = null,
        $discription = null,
        $price = null,
        $img_id = null
    ) {
        $this->name = $name;
        $this->rating = $rating;
        $this->color = $color;
        $this->discription = $discription;
        $this->price = $price;
        $this->img_id = $img_id;
    }

    public static function getNameTable()
    {
        return 'product';
    }
}
