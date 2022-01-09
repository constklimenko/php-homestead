<?php

namespace Narcom\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class ViewTwig extends  View
{
    public static function render(string $view, array $data = []): void{
        $loader = new FilesystemLoader( $_SERVER['DOCUMENT_ROOT'].'/../'.App::config()['twig.views']);
        $twig = new Environment($loader);

        echo $twig->render($view,$data);

    }

}