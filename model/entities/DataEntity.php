<?php


namespace app\model\entities;


use app\model\Model;

abstract class DataEntity extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

}