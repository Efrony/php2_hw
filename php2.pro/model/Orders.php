<?php

namespace app\model;

class Orders extends DbModel
{
    public $id;
    public $status = 'Не подтверждён';
    public $email;
    public $address;
    public $phone;
    public $id_session;
    public $id_product;
    public $name;
    public $summ;

    public function __construct(
        $email = null,
        $address = null,
        $phone,
        $id_session,
        $id_product,
        $name = null,
        $summ = null
    ) {
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->id_session = $id_session;
        $this->id_product = $id_product;
        $this->name = $name;
        $this->summ = $summ;
    }
    public static function getNameTable()
    {
        return 'orders';
    }
}