<?php

namespace app\controllers;

use app\model\Product;
use app\model\Users;
use app\model\Cart;

class ApiController extends Controller
{
    public function actionDefault()
    { }


    public function actionShowmore()
    {
        $data = json_decode(file_get_contents('php://input'));
        $showFromProduct = $data->showFromProduct;
        $showCountProduct = $data->showCountProduct;
        $productList = Product::getLimit($showFromProduct, $showCountProduct);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        header("Content-type: text/html; charset=utf-8;");
        echo $catalog;
        die;
    }


    public function actionRegistration()
    {
        $data = json_decode(file_get_contents('php://input'));
        $name = $data->name;
        $email = $data->email;
        $password = $data->password;
        $phone = $data->phone;


        if ($name == '' || $email == '' || $password == '') {
            $message = 'Не заполнены обязательные поля';
            $classValid =  'invalidForm ';
        } elseif (Users::isRegistred($email)) {
            $message = 'Такой e-mail уже зарегистрирован';
            $classValid =  'invalidForm ';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            (new Users($name, $email, $hash, $phone))->insert();

            $message = 'Регистрация прошла успешно';
            $classValid =  'validForm';
        }
        $response = [
            'message' => $message,
            'classValid' => $classValid,
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionAddtocart()
    {
        $data = json_decode(file_get_contents('php://input'));
        $id_product = $data->id_product;
        (new Cart($this->session, $id_product))->save();
        $response = [
            'countCart' => Cart::countCart(),
            'summCart' => Cart::summCart()
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionDeletetocart()
    {
        $data = json_decode(file_get_contents('php://input'));
        $id_cart_item = $data->id_cart_item;
        $deletedProduct = Cart::getOne($id_cart_item);
        if ($deletedProduct->id_session == $this->session) {
            $deletedProduct->delete();
        }

        $response = [
            'id_deleted' => $id_cart_item,
            'countCart' => Cart::countCart(),
            'summCart' => Cart::summCart()
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionClearCart()
    {
        $cartList = Cart::getColumnWhere('id', 'id_session', $this->session);
        foreach ($cartList as $id_cart_item) {
            $deletedProduct = Cart::getOne($id_cart_item);
            $deletedProduct->delete();
        }
        
        $response = ['countCart' => Cart::countCart()];
        header("Content-type: application/json");
        echo json_encode($response);
    }
}
