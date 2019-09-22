<?php

namespace app\controllers;

use app\model\Product;
use app\model\Comments;


class CatalogController extends Controller
{
    public function actionDefault()
    {
        $productList = Product::getLimit(0, 8);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        echo $this->render('women', ['catalog' => $catalog]);
    }


    public function actionProduct()
    {
        $id = $_GET['id'];
        $productItem = Product::getOne($id);
        $productItem->rating++;
        $productItem->save();
        
        $productList = Product::getLimit(0, 4);
        $commentsList = Comments::getWhere('id_product', $id);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);

        echo $this->render('product', [
            'productItem' => $productItem,
            'commentsList' => $commentsList,
            'catalog' => $catalog,
        ]);
    }
}
