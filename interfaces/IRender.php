<?php


namespace app\interfaces;


interface IRender
{
    public function renderTemplates($template, $params = []);
}