<?php

namespace Narcom\Controller;

use Narcom\Core\DB;
use Narcom\Core\SimpleImage;
use Narcom\Core\View;

class GalleryController
{

    public function index(){
        $db = new DB();
        $connection = $db->getConnection();
        $selectQuery ="SELECT * from `images` ";
        $selectResult = $db->query($selectQuery, $connection);

        $counter = 0;
        $arRusult = [];
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
            $arRusult[$counter] = [];
            $arRusult[$counter]['URL'] = $row['url'];
            $arRusult[$counter]['IMG_PATH'] = $imgPath;

            $counter++;

        }
        unset($counter);

        $template = View::render('gallery', $arRusult);
        echo $template;
        $db->closeConnection();


}

}