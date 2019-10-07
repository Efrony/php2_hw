<?php

namespace app\controllers;

use app\engine\App;
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
        $productList = App::call()->productRepository->getLimit($showFromProduct, $showCountProduct);
        $catalog = $this->renderTemplates('catalog', [
            'productList' => $productList,
            'dir_catalog' => App::call()->config['DIR_CATALOG']
        ]);
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
        } elseif (App::call()->usersRepository->isRegistred($email)) {
            $message = 'Такой e-mail уже зарегистрирован';
            $classValid =  'invalidForm ';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $newUser = new Users($name, $email, $hash, $phone, $this->session);
            App::call()->usersRepository->insert($newUser);

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
        App::call()->cartRepository->save(new Cart($this->request->params['id_product'], $this->session));
        $response = [
            'countCart' => App::call()->cartRepository->countCart($this->session),
            'summCart' =>  App::call()->cartRepository->summCart($this->session)
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionDeletetocart()
    {
        $id_cart_item =  $this->request->params['id_cart_item'];
        $deletedProduct = App::call()->cartRepository->getOne($id_cart_item);
        if ($deletedProduct->id_session == $this->session) {
            App::call()->cartRepository->delete($deletedProduct);
        }

        $response = [
            'id_deleted' => $id_cart_item,
            'countCart' => App::call()->cartRepository->countCart($this->session),
            'summCart' => App::call()->cartRepository->summCart($this->session)
        ];
        header("Content-type: application/json");
        echo json_encode($response);
    }


    public function actionClearCart()
    {
        $cartList = (new CartRepository())->getColumnWhere('id', 'id_session', $this->session);
        foreach ($cartList as $id_cart_item) {
            $deletedProduct = App::call()->cartRepository->getOne($id_cart_item);
            App::call()->cartRepository->delete($deletedProduct);
        }
        
        $response = ['countCart' => App::call()->cartRepository->countCart($this->session)];
        header("Content-type: application/json");
        echo json_encode($response);
    }
}
