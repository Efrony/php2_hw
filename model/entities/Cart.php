<?php

namespace app\model\entities;

use app\engine\Session;
use app\model\entities\DataEntity;

class Cart extends DataEntity
{
    public $id_product;
    public $id_session;

    public function __construct($id_product = null)
    {
        parent::__construct();
        $this->id_product = $id_product;
        $this->id_session = (new Session)->getSession();
    }




}
