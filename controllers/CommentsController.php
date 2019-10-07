<?php

namespace app\controllers;

use app\engine\App;
use app\model\repositories\CommentsRepository;

class CommentsController extends Controller
{
    public function actionDefault()
    {
        $commentsList = App::call()->commentsRepository->getAll();
        echo $this->render('about_us', [
            'commentsList' => $commentsList,
        ]);
    }
}
