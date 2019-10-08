<?php

namespace app\model\repositories;

use app\engine\App;
use app\model\entities\Cart;
use app\model\Repository;

class CartRepository extends Repository
{

    public function getNameTable()
    {
        return 'cart';
    }


    public function getEntityClass()
    {
        return Cart::class;
    }


    public function getCart($id_session)
    {
        $sql = "SELECT 
        cart.id AS id_cart_item, id_session, product.id AS id_product, color, price, quantity, `name`, `img_id`
        FROM cart inner join product on cart.id_product = product.id
        AND id_session = :id_session;";

        return App::call()->db->queryAll($sql, ['id_session' => $id_session]);
    }


    public function countCart($id_session)
    {
        $cartList = $this->getWhere('id_session', $id_session);
        return count($cartList);
    }


    public function summCart($id_session)
    {
        $cartList = $this->getCart($id_session);
        $summCart = 0;
        foreach ($cartList as $itemProduct) {
            $summCart += $itemProduct['price'] * $itemProduct['quantity'];
        }
        return $summCart;
    }

}
