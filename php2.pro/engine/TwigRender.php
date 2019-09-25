<?php

namespace app\engine;

use app\interfaces\IRender;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigRender implements IRender
{
    
    private static $twig;

    public function getFilesystemLoader(){
        return new FilesystemLoader(ROOT_DIR . 'templates/twigTmpl');
    }

    public function getTwig(){
        if (is_null($this->twig)) {
            $this->twig = new Environment($this->getFilesystemLoader());
            echo('создаю объект 1');
        }
        return $this->twig;
    }

    public function renderTemplates($template, $params = [])
    {   

        $this->twig = $this->getTwig();
        ob_start();
        echo $this->twig->render('index.tmpl', ['name' => 'Fabien']);
        return ob_get_clean();
    }
}
