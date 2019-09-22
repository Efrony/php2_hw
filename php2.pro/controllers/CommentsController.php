<?php

namespace app\controllers;

use app\model\Comments;

class CommentsController extends Controller
{
    public function actionDefault()
    {
        $commentsList = Comments::getAll();
        echo $this->render('about_us', [
            'commentsList' => $commentsList,
        ]);
    }
}
