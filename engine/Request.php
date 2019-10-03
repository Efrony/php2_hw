<?php

namespace app\engine;


class Request 
{
    protected $uri;
    protected $method;
    protected $controllerName;
    protected $actionName;
    protected $params;


    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI']; 
        $this->explodeUri();
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
        $this->params = $_REQUEST;
        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)){
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }
}