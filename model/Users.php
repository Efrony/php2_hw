<?php

namespace app\model;

class Users extends DbModel
{
    protected $name;
    protected $email;
    protected $password;
    protected $phone;
    protected $hash;
    protected $id_cart_session;

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
    public static function getUser()
    {
        return Users::isAuth() ? $_SESSION["email"] : "Guest";
    }

    public static function isAuth() //проверка авторизации 
    {
        if (isset($_COOKIE['hash'])) {
            $hash = $_COOKIE['hash'];
            $row = Users::getOneWhere('hash', $hash);
            $user = $row['email'];
            if (!empty($user)) {
                $_SESSION['email'] = $user;
            }
        }
        return isset($_SESSION['email']) ? true : false;
    }

    public static function isCompliance($login, $pass)
    {
        $row = Users::getOneWhere('email', $login);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['email'] = $login;
            return true;
        }
        return false;
    }


    public static function isRegistred($email)
    {
        $result = Users::getOneWhere('email', $email);
        if (is_null($result['email'])) {
            return false;
        } else {
            return true;
        }
    }
}
