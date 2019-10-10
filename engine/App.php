<?php


namespace app\engine;


use app\traits\Tsingletone;

class App
{
    use Tsingletone;

    public $config;
    private $components; // хранилище
    private $controllerName;
    private $actionName;

    public static function call() {
        return static::getInstance();
    }

    // чтобы обращаться к компонентам как к свойствам,  переопределим гетер
    function __get($name) {
        return $this->components->get($name);
    }

    public function run($config) {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    // создает компонент , возвращает объект
    public function createComponent($name){
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                // библиотека ReflectionClass создаёт класс,  который извлекает данные из класса
                // указанного как аргумент.  newInstanceArgs с параметрами переданными
                // в аргумент массивом возвращает объект  с заданными параметрами
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function runController(){
        $this->controllerName = $this->request->controllerName ?: 'index';
        if (substr($this->request->actionName,0,1) !== '?') {  //  чтобы GET  не попадали в action
            $this->actionName = $this->request->actionName ?: 'default';
        } else $this->actionName = 'default';

        $controllerClass = $this->config['CONTROLLER_NAMESPACE'] . ucfirst($this->controllerName) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render);
            $controller->runAction($this->actionName);
        } else {
            echo "no controller {$controllerClass}";
        }

    }
}