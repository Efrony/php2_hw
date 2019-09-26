<?php

namespace app\controllers;

use app\interfaces\IRender;
use app\model\Users;


abstract class Controller
{
    private $action;
    private $defaultAction = 'default';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRender $render)
    {
       $this->renderer = $render; 
    }

    abstract public function actionDefault();

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "no method: {$method}";
        }
    }

    public function render($template, array $paramsContent = [])
    {
        if ($this->useLayout) {
            $layout = $this->layout;
            $inLayout = $this->renderTemplates(LAYOUTS_DIR . $layout, [
                'header' => $this->renderTemplates('header', [
                    'isAuth' => Users::isAuth(),
                    'myEmail' => Users::getUser(),
                    'countCart' => 0,
                ]),
                'menu' => $this->renderTemplates('menu', ['myEmail' => Users::getUser()]),
                'content' => $this->renderTemplates($template, $paramsContent),
                'footer' => $this->renderTemplates('footer'),
            ]);
            return $inLayout;
        } else {
            return $this->renderTemplates($template, $params = []);
        }
    }


    public function renderTemplates($template, $params = [])
    {
        return $this->renderer->renderTemplates($template, $params);
    }


}
