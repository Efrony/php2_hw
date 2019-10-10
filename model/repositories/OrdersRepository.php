<?php

namespace app\model\repositories;

use app\model\entities\Orders;
use app\model\Repository;
use app\engine\App;
use phpDocumentor\Reflection\Types\Array_;

class OrdersRepository extends Repository
{
    public  function getNameTable()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Orders::class;
    }

    public function renderProductsByOrder(Array $order) {
        $productList = explode(';', $order['id_product']);
        ob_start();
        foreach ($productList as $productID) {
            $productItem = App::call()->productRepository->getOne($productID);
            echo "$productItem->color $productItem->name - $ $productItem->price <br>";
        }
        return ob_get_clean();
    }
}