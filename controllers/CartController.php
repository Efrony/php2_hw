<?php

namespace app\controllers;

use app\model\repositories\CartRepository;


class CartController extends Controller
{
    public function actionDefault()
    {
        $cartList = (new CartRepository())->getCart();
        $countCart = (new CartRepository())->countCart();
        $summCart = (new CartRepository())->summCart();
        echo $this->render('cart', ['cartList' => $cartList, 'countCart' => $countCart, 'summCart' => $summCart]);
    }

}
