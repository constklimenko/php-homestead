<?php
$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
$nameOfFile = basename($_FILES['userfile']['name']);
$uploadFile = $uploadPath . $nameOfFile;

require_once('db_connection.php');

if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)){
    echo 'успешная загрузка файла';

    $insertQuery = "INSERT INTO images (`name`, `url`) VALUES('".$nameOfFile."' , '". str_replace('/home/vagrant/code/public', '',$uploadFile). "');";
    if(mysqli_query($connection, $insertQuery)) {
        echo 'успешно добавлен новый адрес файла<br>';
    }else{
        echo 'ахтунг! не добавлен новый адрес файла<br>';
    };

    header('Location: http://homestead.test/index.php' );

}else{
    echo 'ошибка загрузки файла';
}

mysqli_close($connection);


