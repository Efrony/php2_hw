<?php

namespace app\engine;

use app\interfaces\IRender;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigRender implements IRender
{
    private $loader;
    private $twig;


    public function __construct(){
        $this->loader = new FilesystemLoader(ROOT_DIR . 'templates/twigTmpl');
        $this->twig = new Environment($this->loader);
    }


    public function renderTemplates($template, $params = [])
    {   
        ob_start();
        echo $this->twig->render($template . '.tmpl', $params);
        return ob_get_clean();
    }
}
