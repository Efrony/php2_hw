<?php

namespace app\controllers;

use app\engine\App;
use app\interfaces\IRender;
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
            $inLayout = $this->renderTemplates( App::call()->config['LAYOUTS_DIR'] . $layout, [
                'header' => $this->renderTemplates('header', [
                    'isAuth' => App::call()->usersRepository->isAuth(),
                    'myEmail' => App::call()->usersRepository->getUser(),
                    'countCart' => App::call()->cartRepository->countCart($this->session),
                ]),
                'menu' => $this->renderTemplates('menu', ['myEmail' => App::call()->usersRepository->getUser()]),
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
