<?php

namespace app\model;

class Users extends DbModel
{
    public $name;
    public $email;
    public $password;
    public $phone;

    public function __construct(
        $name = null,
        $email = null,
        $password = null,
        $phone = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public static function getNameTable()
    {
        return 'users';
    }
}
