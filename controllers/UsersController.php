<?php

namespace app\controllers;

use app\engine\App;
use app\model\repositories\UsersRepository;

class UsersController extends Controller
{
    public function actionDefault()
    {
        echo $this->render('users', [
            'isAuth' => App::call()->usersRepository->isAuth(),
        ]);
    }
    public function actionLogin()  // после нажатия кнопки логин
    {
        $login = $this->request->params['login'];
        $pass = $this->request->params['password'];
        $rememberMe = $this->request->params['remember'];

        if (!App::call()->usersRepository->isCompliance($login, $pass)) {  // если не соответствует логин и пароль
            $message = 'Не верный логин или пароль';
            header("Location: /users/default/?loginmessage={$message}");
            die;
        } else {
            $user = App::call()->usersRepository->getObjectWhere('email', $login);

            if ($rememberMe == 'yes') { // если нажата кнопка Запомнить 
                $hash = uniqid(rand(), true);  // генерировать случайный хэш
                $user->hash = $hash;
                App::call()->usersRepository->update($user);
                $this->sessionObj->setCookie("hash", $hash, time() + 36000, '/');
            }

            $id_cart_session = $user->id_cart_session;
            if (is_null($id_cart_session)) {
                $user->id_cart_session = $this->session;
                App::call()->usersRepository->update($user);
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
