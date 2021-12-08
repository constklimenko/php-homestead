<?php
$file = "391308.jpg";
$thumbHeight = 240;
$progressive = false;

$img;
if(preg_match('/[.](jpg)$/', $file)) {
    $img = imagecreatefromjpeg($file);
} else if (preg_match('/[.](gif)$/', $file)) {
    $img = imagecreatefromgif($file);
} else if (preg_match('/[.](png)$/', $file)) {
    $img = imagecreatefrompng($file);
} else  if(preg_match('/[.](jpeg)$/', $file)) {
    $img = imagecreatefromjpeg($file);
}

$arr_image_details = getimagesize($file);
$width = $arr_image_details[0]; // width of input image
$height = $arr_image_details[1]; // height of input image

$new_height = $thumbHeight;    // new thumbnail height
$new_width = intval($thumbHeight * $width / $height);  // new thumbnail width


$tmp_img = imagecreatetruecolor( $new_width, $new_height );
imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
if($progressive) imageinterlace($tmp_img, 1);
imagejpeg( $tmp_img, "lag-$file",100 );

imagedestroy($img);
imagedestroy($tmp_img);
echo '<img src="lag-$file">';