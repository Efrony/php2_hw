<?php

namespace app\engine;


class Session 
{
    protected $session;

    public function __construct()
    {
        $this->session = session_id(); 
    }

    
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }


    private function explodeUri() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $paramsUri = explode('/', $this->url);
        $this->controllerName = $paramsUri[1];
        $this->actionName = $paramsUri[2];
        $this->otherParams = $_REQUEST;
    }
}