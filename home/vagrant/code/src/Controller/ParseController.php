<?php

namespace Narcom\Controller;

use Narcom\Core\DB;

class ParseController
{
    public function index()
    {
        $db = new DB();
        $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $nameOfFile = basename($_FILES['userfile']['name']);
        $uploadFile = $uploadPath . $nameOfFile;
        $connection = $db->getConnection();

        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)){
            echo 'успешная загрузка файла';

            $insertQuery = "INSERT INTO images (`name`, `url`) VALUES('".$nameOfFile."' , '". str_replace('/home/vagrant/code/public', '',$uploadFile). "');";
            if(mysqli_query($connection, $insertQuery)) {
                echo 'успешно добавлен новый адрес файла<br>';
                $db->closeConnection();
                header('Location: http://homestead.test/gallery/' );
            }else{
                echo 'ахтунг! не добавлен новый адрес файла<br>';
                $db->closeConnection();
            };

        }else{
            echo 'ошибка загрузки файла';
            $db->closeConnection();
        }


    }




}