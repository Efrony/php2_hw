<?php
session_start();

use app\engine\App;


//include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
//spl_autoload_register([new Autoload, 'load']);

require_once __DIR__ . "\\..\\vendor\\autoload.php";
$config = include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";


try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}





