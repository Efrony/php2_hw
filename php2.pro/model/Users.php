<?php


namespace app\model;
use app\engine\Db;

class Users extends Model
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
        parent::__construct(new Db);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function getNameTable()
    {
        return 'users';
    }


}