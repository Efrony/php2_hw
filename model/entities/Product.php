<?php

namespace app\model\entities;

use app\model\entities\DataEntity;

class Product extends DataEntity
{
    public $name;
    public $rating;
    public $color;
    public $discription;
    public $price;
    public $img_id;

    public function __construct(
        $name = null,
        $rating = null,
        $color = null,
        $discription = null,
        $price = null,
        $img_id = null
    ) {
        parent::__construct();
        $this->name = $name;
        $this->rating = $rating;
        $this->color = $color;
        $this->discription = $discription;
        $this->price = $price;
        $this->img_id = $img_id;
        unset($this->id_session);
    }
}
