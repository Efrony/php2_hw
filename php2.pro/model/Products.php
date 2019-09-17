<?php

namespace app\model;

class Products extends DbModel
{
    public $id;
    public $name;
    public $rating;
    public $color;
    public $discription;
    public $price;
    public $img_id;

    public function __construct(
        $id = null,
        $name = null,
        $rating = null,
        $color = null,
        $discription = null,
        $price = null,
        $img_id = null
    ) {
        $this->id = $id;
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
