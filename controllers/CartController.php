<?php

namespace app\controllers;

use app\engine\App;
use app\model\repositories\CartRepository;


class CartController extends Controller
{
    public function actionDefault()
    {
        $cartList = App::call()->cartRepository->getCart($this->session);
        $countCart =  App::call()->cartRepository->countCart($this->session);
        $summCart =  App::call()->cartRepository->summCart($this->session);
        echo $this->render('cart', [
            'cartList' => $cartList,
            'countCart' => $countCart,
            'summCart' => $summCart,
            'dir_catalog' => App::call()->config['DIR_CATALOG']
        ]);
    }

}
