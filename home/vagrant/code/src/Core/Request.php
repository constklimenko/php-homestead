<?php

namespace Narcom\Core;



class Request
{
    private $controller = 'DefaultController';
    private $method = 'index';

    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, ['']);
        var_dump($uri);

        if(isset($uri[0])){
            $this->controller = $uri[0];
        }
        if(isset($uri[1])){
            $this->method = $uri[1];
        }

        $this->ValidateCommand();
    }

    private function ValidateCommand()
    {

    }


}