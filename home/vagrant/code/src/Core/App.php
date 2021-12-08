<?php

namespace Narcom\Core;

class App
{

    public function __construct()
    {
    }

    public function  run(){
        echo "Вы запустили приложение<br>";
        echo "Вы запросили команду: " . $_SERVER['REQUEST_URI'];
    }
}