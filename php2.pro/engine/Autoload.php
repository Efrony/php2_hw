<?php
namespace app\engine;

class Autoload
{
    public function load($className){
        $fileName = "../{$className}.php";
        $fileName = str_replace('app', '', $fileName);
        $fileName = str_replace('\\', '/', $fileName);
        if (file_exists($fileName)){
            include $fileName;
        }
    }
}