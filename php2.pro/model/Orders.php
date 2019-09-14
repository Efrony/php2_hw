<?php


namespace app\model;
use app\engine\Db;

class Orders extends Model
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
        $email,
        $address,
        $phone,
        $id_session,
        $id_product,
        $name,
        $summ
    ) {
        parent::__construct(new Db);
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->id_session = $id_session;
        $this->id_product = $id_product;
        $this->name = $name;
        $this->summ = $summ;
    }
    public function getNameTable()
    {
        return 'orders';
    }
}