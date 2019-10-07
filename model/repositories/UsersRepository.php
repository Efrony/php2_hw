<?php

namespace app\model\repositories;

use app\model\entities\Users;
use app\model\Repository;

class UsersRepository extends Repository
{
    public function getNameTable()
    {
        return 'users';
    }


    public function getEntityClass()
    {
        return Users::class;
    }


    public function getUser()
    {
        return $this->isAuth() ? $_SESSION["email"] : "Guest";
    }


    public function isAuth() //проверка авторизации
    {
        if (isset($_COOKIE['hash'])) {
            $hash = $_COOKIE['hash'];  
            $row = $this->getOneWhere('hash', $hash);
            $user = $row['email'];
            if (!empty($user)) {
                $_SESSION['email'] = $user;
            }
        }
        return isset($_SESSION['email']) ? true : false;
    }


    public function isCompliance($login, $pass)
    {
        $row = $this->getOneWhere('email', $login);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['email'] = $login;
            return true;
        }
        return false;
    }


    public function isRegistred($email)
    {
        $result = $this->getOneWhere('email', $email);
        if (is_null($result['email'])) {
            return false;
        } else {
            return true;
        }
    }
}
