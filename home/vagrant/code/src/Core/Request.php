<?php

namespace Narcom\Core;



class Request
{
    private $controller = 'Default';
    private $method = 'index';

    /**
     * @return mixed|string
     */
    public function getController()
    {
        return "Narcom\Controller\\" .ucfirst($this->controller) .'Controller';
    }

    /**
     * @param mixed|string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed|string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed|string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, ['']);
        var_dump($uri);

        if(isset($uri[1])){
            $this->controller = $uri[1];
        }
        if(isset($uri[2])){
            $this->method = $uri[2];
        }

        if($this->ValidateCommand()){

        };
    }

    private function ValidateCommand()
    {
        if(!class_exists("Narcom\Controller\\" . ucfirst($this->controller) .'Controller' )){
            echo "Нет  контроллера" . ucfirst($this->controller) .'Controller<br>';
            return false;
        }

        if(!method_exists("Narcom\Controller\\" . ucfirst($this->controller) .'Controller', $this->method )){
            echo "Нет  метода " . $this->method ." в классе " . ucfirst($this->controller) .'Controller<br>';
            return false;
        }

    }


}