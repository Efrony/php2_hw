<?php

namespace app\controllers;

use app\model\Cart;


class CartController extends Controller
{
    public function actionDefault()
    {
        $cartList = Cart::getCart();
        $countCart = Cart::countCart();
        $summCart = Cart::summCart();
        echo $this->render('cart', ['cartList' => $cartList, 'countCart' => $countCart, 'summCart' => $summCart]);
    }

}
