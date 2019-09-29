<?php
session_start();

use app\engine\Render;
use app\engine\Request;
use app\engine\TwigRender;


include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload, 'load']);
require_once ROOT_DIR . "vendor/autoload.php";


$request = new Request;
$controllerName = $request->controllerName ?: 'index';
$actionName = $request->actionName ?: 'default';


$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render);
    $controller->runAction($actionName);
} else {
    echo "no controller {$controllerClass}";
}




