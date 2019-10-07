<?php

namespace app\model\repositories;

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


    public function getCart()
    {
        $sql = "SELECT 
        cart.id AS id_cart_item, id_session, product.id AS id_product, color, price, quantity, `name`, `img_id`
        FROM cart inner join product on cart.id_product = product.id
        AND id_session = :id_session;";

        return $this->db->queryAll($sql, ['id_session' => $this->id_session]);
    }


    public function countCart()
    {
        $cartList = $this->getWhere('id_session', $this->id_session);
        return count($cartList);
    }


    public function summCart()
    {
        $cartList = $this->getCart();
        $summCart = 0;
        foreach ($cartList as $itemProduct) {
            $summCart += $itemProduct['price'] * $itemProduct['quantity'];
        }
        return $summCart;
    }

}
