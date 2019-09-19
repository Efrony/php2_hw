<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

use app\model\Product;

spl_autoload_register([new Autoload, 'load']);


$prod_1 = new Product(1,2,3,4,5,6,7); 
$prod_1->insert(); //create

$prod_2 = $prod_1->getOne(1); //read
$prod_2->insert();

$prod_3 = $prod_2;
$prod_3->insert();
$prod_3->name = 'TEST';
$prod_3->discription = 'test test test';
$prod_3->update(); //update

$prod_4 = $prod_3->getObjectWhere('name', 'TEST');
$prod_4->insert();
$prod_4->delete(); // delete





