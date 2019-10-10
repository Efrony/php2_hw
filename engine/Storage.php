<?php


namespace app\engine;


class Storage
{
    protected $items = [];

    public function set($key, $object){
        $this->items[$key] = $object;
    }

    public function get($key){
        if(!isset($this->items[$key])) {
            // если при обращении к св-ву или метода не существует то создадим его
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }
}