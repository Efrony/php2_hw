<?php

namespace app\model;

class Orders extends DbModel
{
    protected $id;
    protected $status = 'Не подтверждён';
    protected $email;
    protected $address;
    protected $phone;
    protected $id_session;
    protected $id_product;
    protected $name;
    protected $summ;

    public function __construct(
        $email = null,
        $address = null,
        $phone= null,
        $id_session= null,
        $id_product= null,
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