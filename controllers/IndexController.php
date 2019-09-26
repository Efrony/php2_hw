<?php

namespace app\controllers;

class IndexController extends Controller
{
    public function actionDefault()
    {
        echo $this->render('home');
    }
}
