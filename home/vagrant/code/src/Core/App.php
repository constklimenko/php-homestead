<?php

namespace Narcom\Core;

class App
{
    private static $configuration = [];

    public function __construct()
    {
        self::$configuration = (new Config())->getConfig();
    }

    public function  run(){
        echo "Вы запустили приложение<br>";
        echo "Вы запросили команду: " . $_SERVER['REQUEST_URI'];

        $request = new Request();

        $controllerName = $request->getController();

        $controller = new $controllerName();

        $method = $request->getMethod();

        $controller->$method();
    }

    public static function config(){
        return self::$configuration;
    }
}