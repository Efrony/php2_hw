<?php

namespace app\controllers;

use app\model\repositories\CommentsRepository;
use app\model\repositories\ProductRepository;


class CatalogController extends Controller
{
    public function actionDefault()
    {
        $productList = (new ProductRepository())->getLimit(0, 8);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        echo $this->render('women', ['catalog' => $catalog]);
    }


    public function actionProduct()
    {
        $id = $this->request->params['id'];
        $productItem = (new ProductRepository())->getOne($id);
        $productItem->rating++;
        (new ProductRepository())->save($productItem);
        
        $productList = (new ProductRepository())->getLimit(0, 4);
        $commentsList = (new CommentsRepository())->getWhere('id_product', $id);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);

        echo $this->render('product', [
            'productItem' => $productItem,
            'commentsList' => $commentsList,
            'catalog' => $catalog,
        ]);
    }
}
