<?php


namespace app\controllers;

use app\engine\App;


class AdminController extends Controller
{
    public function actionDefault()
    {
        $ordersList = App::call()->ordersRepository->getAll();
        echo $this->render('admin', [
            'ordersList' => $ordersList,
            'isAdmin' => App::call()->usersRepository->isAdmin(),
        ]);
    }


}