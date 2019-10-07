<?php

namespace app\model\repositories;

use app\model\entities\Orders;
use app\model\Repository;

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
}