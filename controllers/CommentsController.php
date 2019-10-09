<?php

namespace app\controllers;

use app\engine\App;


class CommentsController extends Controller
{
    public function actionDefault()
    {
        $commentsList = App::call()->commentsRepository->getAll();
        echo $this->render('about_us', [
            'commentsList' => $commentsList,
            'isAdmin' => App::call()->usersRepository->isAdmin(),
            'actionName' => App::call()->actionName
        ]);
    }
}
