<?php

class Autoload
{
    public function load($className){
        $fileName = str_replace(['app\\', '\\'] ,[ROOT_DIR, DIRECTORY_SEPARATOR], $className) . ".php";
        if (file_exists($fileName)){
            include $fileName;
        }
    }
}