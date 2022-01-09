<?php

namespace Narcom\Controller;

use Narcom\Core\ViewTwig;

class DefaultController
{
    public function index(){
        $template = ViewTwig::render('index.twig',['name' => 'ивын сусынин']);
        echo $template;
    }

}