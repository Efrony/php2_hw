<?php

namespace app\engine;

use app\interfaces\IRender;

class Render implements IRender
{
    public function renderTemplates($template, $params = [])
    {
        extract($params);
        $filename = TEMPLATES_DIR . "{$template}.php";
        ob_start();
        if (file_exists($filename)) {
            include $filename;
        } else {
            echo "no template: {$filename}";
        }
        return ob_get_clean();
    }
}