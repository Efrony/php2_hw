<?php

namespace app\controllers;

use app\interfaces\IRender;
use app\model\repositories\CartRepository;
use app\model\repositories\UsersRepository;
use app\engine\Request;
use app\engine\Session;


abstract class Controller
{
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;
    protected $request;
    protected $sessionObj;
    protected $session;

    public function __construct(IRender $render)
    {
       $this->renderer = $render;
       $this->request = new Request;  
       $this->sessionObj = new Session;
       $this->session = $this->sessionObj->getSession();
    }

    abstract public function actionDefault();

    public function runAction($action)
    {
        $method = "action" . ucfirst($action);
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
                    'isAuth' => (new UsersRepository())->isAuth(),
                    'myEmail' => (new UsersRepository())->getUser(),
                    'countCart' => (new CartRepository())->countCart(),
                ]),
                'menu' => $this->renderTemplates('menu', ['myEmail' => (new UsersRepository())->getUser()]),
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
