<?php

namespace app\controllers;

use app\model\repositories\CommentsRepository;

class CommentsController extends Controller
{
    public function actionDefault()
    {
        $commentsList = (new CommentsRepository())->getAll();
        echo $this->render('about_us', [
            'commentsList' => $commentsList,
        ]);
    }
}
