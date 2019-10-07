<?php

namespace app\model\entities;

use app\model\entities\DataEntity;

class Users extends DataEntity
{
    public $name;
    public $email;
    public $password;
    public $phone;
    public $hash;
    public $id_cart_session;

    public function __construct(
        $name = null,
        $email = null,
        $password = null,
        $phone = null,
        $id_cart_session = null

    ) {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->id_cart_session = $id_cart_session;
        unset($this->id_session);
    }
}
