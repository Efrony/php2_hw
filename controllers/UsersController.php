<?php

namespace app\controllers;

use app\model\Users;

class UsersController extends Controller
{
    public function actionDefault()
    {
        echo $this->render('users', [
            'isAuth' => Users::isAuth(),
        ]);
    }
    public function actionLogin()  // после нажатия кнопки логин
    {
        $login = $this->request->otherParams['login'];
        $pass = $this->request->otherParams['password'];
        $rememberMe = $this->request->otherParams['remember'];

        if (!Users::isCompliance($login, $pass)) {  // если не соответствует логин и пароль
            $message = 'Не верный логин или пароль';
            header("Location: /users/default/?loginmessage={$message}");
            die;
        } else {
            if ($rememberMe == 'yes') { // если нажата кнопка Запомнить 
                $hash = uniqid(rand(), true);  // генерировать случайный хэш
                $user = Users::getObjectWhere('email', $login);
                $user->hash = $hash;
                $user->update(); // записать новый хэш в бд
                setcookie("hash", $hash, time() + 36000, '/');  //  установить куки
            }

            $id_cart_session = $user->id_cart_session;
            if (is_null($id_cart_session)) {
                $user->id_cart_session = $this->session;
                $user->update();
            } else {
               session_destroy();
               session_id($id_cart_session);
               session_start();       
            }
        }
        header("Location: /users/");
    }

    public function actionExit()
    {
        setcookie("PHPSESSID", null, time() - 1, '/');
        setcookie("hash", null, time() - 1, '/');
        header("Location: /");
    }
}
