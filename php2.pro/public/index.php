<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

use app\engine\Db;
use app\model\Products;


spl_autoload_register([new Autoload, 'load']);

$prod = new Products(1,2,3,4,5,6,7);

$prod->insert();

