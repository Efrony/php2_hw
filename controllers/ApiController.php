<?php

namespace app\controllers;

use app\model\entities\Cart;
use app\model\entities\Users;
use app\model\repositories\CartRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UsersRepository;

class ApiController extends Controller
{
    public function actionDefault()
    { }


    public function actionShowmore()
    {
        $showFromProduct = $this->request->params['showFromProduct'];
        $showCountProduct = $this->request->params['showCountProduct'];
        $productList = (new ProductRepository())->getLimit($showFromProduct, $showCountProduct);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        header("Content-type: text/html; charset=utf-8;");
        echo $catalog;
        die;
    }


    public function actionRegistration()
    {
        $name = $this->request->params['name'];
        $email = $this->request->params['email'];
        $password = $this->request->params['password'];
        $phone = $this->request->params['phone'];


        if ($name == '' || $email == '' || $password == '') {
            $message = 'Не заполнены обязательные поля';
            $classValid =  'invalidForm ';
        } elseif ((new UsersRepository())->isRegistred($email)) {
            $message = 'Такой e-mail уже зарегистрирован';
            $classValid =  'invalidForm ';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $newUser =new Users($name, $email, $hash, $phone, $this->session);
            (new UsersRepository())->insert($newUser);

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
        (new CartRepository())->save(new Cart($this->request->params['id_product']));
        $response = [
            'countCart' => (new CartRepository())->countCart(),
            'summCart' =>  (new CartRepository())->summCart()
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionDeletetocart()
    {
        $id_cart_item =  $this->request->params['id_cart_item'];
        $deletedProduct =(new CartRepository())->getOne($id_cart_item);
        if ($deletedProduct->id_session == $this->session) {
            (new CartRepository())->delete($deletedProduct);
        }

        $response = [
            'id_deleted' => $id_cart_item,
            'countCart' => (new CartRepository())->countCart(),
            'summCart' => (new CartRepository())->summCart()
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionClearCart()
    {
        $cartList = (new CartRepository())->getColumnWhere('id', 'id_session', $this->session);
        foreach ($cartList as $id_cart_item) {
            $deletedProduct = (new CartRepository())->getOne($id_cart_item);
            (new CartRepository())->delete($deletedProduct);
        }
        
        $response = ['countCart' => (new CartRepository())->countCart()];
        header("Content-type: application/json");
        echo json_encode($response);
    }
}
