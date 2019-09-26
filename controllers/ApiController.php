<?php

namespace app\controllers;

use app\model\Product;
use app\model\Users;

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
}
