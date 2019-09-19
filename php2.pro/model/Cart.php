<?php

namespace app\model;


class Cart extends DbModel
{
    public $id;
    public $id_session;
    public $id_product;

    public function __construct($id_session = null, $id_product = null)
    {
        $this->id_session = $id_session;
        $this->id_product = $id_product;
    }

    public static function getNameTable()
    {
        return 'cart';
    }
}