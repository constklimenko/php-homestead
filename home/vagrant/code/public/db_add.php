<?php

require_once('db_connection.php');

if(isset($_POST['name']) && isset($_POST['review'])){
    $insertQuery = "INSERT INTO reviews (`name`, `review`) VALUES('".$_POST['name']."' , '".$_POST['review']. "');";
   if(mysqli_query($connection, $insertQuery)) {
       echo 'успешно добавлен новый отзыв';
   }else{
       echo 'ахтунг! не добавлен новый отзыв';
   };
}
