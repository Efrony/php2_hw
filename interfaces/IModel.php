<?php


namespace app\interfaces;


interface IModel
{
    public static function getNameTable();

    public static function getOne($id);

    public static function getAll();

    public function insert();

    public function update();

    public function delete();
}