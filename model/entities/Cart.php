<?php

namespace app\model\entities;

class Cart extends DataEntity
{
    public $id_product;
    public $id_session;

    public function __construct($id_product = null, $id_session = null)
    {
        $this->id_product = $id_product;
        $this->id_session = $id_session;
    }

}
