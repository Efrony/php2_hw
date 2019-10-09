<?php

namespace app\controllers;

use app\engine\App;
use app\model\repositories\CommentsRepository;
use app\model\repositories\ProductRepository;


class CatalogController extends Controller
{
    public function actionDefault()
    {
        $productList =  App::call()->productRepository->getLimit(0, 8);
        $catalog = $this->renderTemplates('catalog', [
            'productList' => $productList,
            'dir_catalog' => App::call()->config['DIR_CATALOG']
        ]);
        echo $this->render('women', ['catalog' => $catalog]);
    }


    public function actionProduct()
    {
        $id = $this->request->params['id'];
        $productItem =  App::call()->productRepository->getOne($id);
        $productItem->rating++;
        (new ProductRepository())->save($productItem);
        
        $productList =  App::call()->productRepository->getLimit(0, 4);
        $commentsList =  App::call()->commentsRepository->getWhere('id_product', $id);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);

        echo $this->render('product', [
            'productItem' => $productItem,
            'commentsList' => $commentsList,
            'catalog' => $catalog,
            'dir_catalog' => App::call()->config['DIR_CATALOG'],
            'isAdmin' => App::call()->usersRepository->isAdmin(),
        ]);
    }
}
