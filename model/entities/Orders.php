<?php

namespace app\model\entities;


class Orders extends DataEntity
{
    public $status = 'Не подтверждён';
    public $email;
    public $address;
    public $phone;
    public $id_product;
    public $name;
    public $summ;

    public function __construct(
        $email = null,
        $address = null,
        $phone= null,
        $id_product= null,
        $name = null,
        $summ = null
    ) {
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->id_product = $id_product;
        $this->name = $name;
        $this->summ = $summ;
    }

}