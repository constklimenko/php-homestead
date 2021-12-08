<?php
require_once('db_connection.php');
$selectQuery ="SELECT * from reviews ";
$selectResult = mysqli_query($connection, $selectQuery);

if(!$selectResult){
    echo "ошибка выполнения запроса";
}else{
    echo "<br>запрос выполнен, найдено строк:". mysqli_num_rows($selectResult). "<br>";
}

while ($row = mysqli_fetch_assoc($selectResult)){
    echo "Имя: " . $row['name'] . " ID: " . $row['id'] . "<br>". " отзыв: "  . $row['review'] . "<br>";
}