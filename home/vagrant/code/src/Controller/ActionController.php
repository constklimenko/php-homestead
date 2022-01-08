<?php

namespace Narcom\Controller;
use Narcom\Model\User;
use Narcom\Core\View;

/**
 *
 */
class ActionController
{
    public function index(){
        echo "Hello world!";
    }
    public function move(){
        User::saiHi();

        $user = new User();
        $user->setId('1');
        $user->setName('Vasya');
        echo "Move your body!";

        $template = View::render('move', ['user_name' => $user->getName(), 'user_id' => $user->getId(), 'user' => 'Narcom']);
        echo $template;
    }
}