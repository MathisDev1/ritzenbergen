<?php
header("Content-Type: image/png");
if(!isset($_GET["image"])) die("Bitte gebe GET image an!");
if(!isset($_GET["text"])) die("Bitte gebe GET text an!");

$image=imagecreatefromjpeg($_GET["image"]);
$text=$_GET["text"];

$newsize = 0.02 * 10 * imagesx($image);
$tb = imagettfbbox($newsize, 0, "../../../tnfont.ttf", $text);
$x = ceil((imagesx($image) - $tb[2]) / 2);
$y = ceil((imagesy($image) - $tb[5]) / 2);
imagettftext($image, $newsize, 0, $x, $y, 0xFFFFFF, "../../../tnfont.ttf", $text);

imagepng($image);