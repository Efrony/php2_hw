<?php

namespace app\controllers;

use app\model\repositories\UsersRepository;

class UsersController extends Controller
{
    public function actionDefault()
    {
        echo $this->render('users', [
            'isAuth' => (new UsersRepository())->isAuth(),
        ]);
    }
    public function actionLogin()  // после нажатия кнопки логин
    {
        $login = $this->request->params['login'];
        $pass = $this->request->params['password'];
        $rememberMe = $this->request->params['remember'];

        if (!(new UsersRepository())->isCompliance($login, $pass)) {  // если не соответствует логин и пароль
            $message = 'Не верный логин или пароль';
            header("Location: /users/default/?loginmessage={$message}");
            die;
        } else {
            if ($rememberMe == 'yes') { // если нажата кнопка Запомнить 
                $hash = uniqid(rand(), true);  // генерировать случайный хэш
                $user = (new UsersRepository())->getObjectWhere('email', $login);
                $user->hash = $hash;
                (new UsersRepository())->update($user);
                $this->sessionObj->setCookie("hash", $hash, time() + 36000, '/');
            }

            $id_cart_session = $user->id_cart_session;
            if (is_null($id_cart_session)) {
                $user->id_cart_session = $this->session;
                (new UsersRepository())->update($user);
            } else {
               $this->sessionObj->destroySession();
               $this->sessionObj->newSession($id_cart_session);      
            }
        }
        header("Location: /users/");
    }

    public function actionExit()
    {
        $this->sessionObj->destroySession();
        $this->sessionObj->setCookie("hash", null, time() - 1, '/');
        header("Location: /");
    }
}
