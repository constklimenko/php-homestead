<?php
require('../vendor/autoload.php');

use Narcom\Core\App;
use \Narcom\Core\Request;
use \Narcom\Core\SimpleImage;

$app = new App();

$app->run();

$request = new Request();

?>
    <form enctype="multipart/form-data" action="parse_file.php"  method="post">
        <input type="hidden" name="MAX_FILESIZE" value="500000">

        <input type="file" name="userfile">
        <input type="submit">

    </form>

<?php




require_once('db_connection.php');
$selectQuery ="SELECT * from `images` ";
$selectResult = mysqli_query($connection, $selectQuery);

if(!$selectResult){
    echo "ошибка выполнения запроса";
}else{
    echo "<br>запрос выполнен, найдено строк:". mysqli_num_rows($selectResult). "<br>";
}
$counter = 0;
while ($row = mysqli_fetch_assoc($selectResult)){

    $image = new SimpleImage();
    $image->load('./'.$row['url']);
    $image->resizeToWidth(250);
    $img_name = $row['name'];
    $imgPath = "upload/mini/$img_name";
    $image->save($imgPath);
    $uploadQuery ="UPDATE images SET url_mini = '".$imgPath."', views = ".((int)$row['views'] + 1)." WHERE id = ".$row['id'].";";
    if(!mysqli_query($connection, $uploadQuery)){
        echo "не загрузился адрес миниатюры";
    };
    $counter++;
    ?>
    <a href="<?=str_replace('/home/vagrant/code/public', '', $row['url'])?>">
        <img src="<?=$imgPath;?>"  style="width: 250px;height:auto;">
    </a>

    <?php
}
?>
    <div class="modal_frame hide">
    </div>
<?php

mysqli_close($connection);