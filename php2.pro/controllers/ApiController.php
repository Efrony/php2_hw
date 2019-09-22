<?php

namespace app\controllers;

use app\model\Product;

class ApiController extends Controller
{
    public function actionDefault() {}

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
}
