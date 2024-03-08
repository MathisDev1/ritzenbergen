<?php
header ('Content-Type: image/png');
error_reporting(0);
/**
 * GET
 * Argumente: 
 *      path: Der Pfad zu den Bildern
 *      recursive: Bool: Soll Rekursiv nach Bildern gesucht werden?
 *      tn: Thumbnail: Soll eine Beschriftung rauf?
 *      text: Welcher Text soll auf das Thumbnail?
 *      color: Welche Farbe soll der Text haben?
 */
include("colorstringconvert.php");
if (!isset($_GET["path"]))
    die("Bitte gebe path an!");
if (!isset($_GET["recursive"]))
    die("Bitte gebe recursive an!");
if (isset($_GET["tn"])) {
    if (!isset($_GET["text"]))
        die("Bitte gebe text an!");
    else
        $text=$_GET["text"];

    if (!isset($_GET["color"]))
        $color=0xFFFFFF;
    else
        $color=color_name_to_hex($_GET["color"]);
        //echo "Set color: ".$color."<br>";
}
$path = $_GET["path"];
$blacklist = [];
$file_ext = ["jpg", "png", "gif"];
$tn=isset($_GET["tn"]);
$font="tnfont.ttf";

function getImage($path)
{
    global $blacklist, $file_ext;
    $images=[];
    foreach (scandir($path) as $value) {
        if (in_array($value, $blacklist))
            continue;
        if (is_dir($path . "/" . $value)) {
            if (!$_GET["recursive"] || $value == "." || $value == "..")
                continue;
            else
                getImage($path . "/" . $value);
        }
        if (!in_array(pathinfo($path . "/" . $value, PATHINFO_EXTENSION), $file_ext))
            continue;
        $images[]=$path . "/" . $value;
    }
    // print_r($images);
    // echo "<br>";
    $imagekey=array_rand($images);
    $imagepath=$images[$imagekey];
    // echo $imagepath;
    // echo "<br><br>";
    $image=imagecreatefromjpeg($imagepath);
    //$image=imagecreatefromjpeg("bilder/erntefest/2011/pic08.jpg");
    imagepng($image);
    
}
getImage($path);
// getImage($path);