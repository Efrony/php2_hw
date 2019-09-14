<?php

namespace app\model;
use app\engine\Db;

class Cart extends Model
{
    public $id;
    public $id_session;
    public $id_product;

    public function __construct($id_session = null, $id_product = null)
    {
        parent::__construct(new Db);
        $this->id_session = $id_session;
        $this->id_product = $id_product;
    }

    public function getNameTable()
    {
        return 'cart';
    }

    public function getCart()
    {}

    public  function countCart()
    {}

    public  function summCart()
    {}

    public  function clearCart()
    {}
}
