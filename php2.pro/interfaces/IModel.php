<?php


namespace app\interfaces;


interface IModel
{
    public function getNameTable();

    public function getOneFromDb($id);

    public function getAllFromDb();
}