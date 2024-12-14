<?php
header('Content-Type: image/png');
error_reporting(-1);
/**
 * GET
 * Argumente: 
 *      path: Der Pfad zu den Bildern
 *      recursive: Bool: Soll Rekursiv nach Bildern gesucht werden?
 *      tn: Thumbnail: Soll eine Beschriftung rauf?
 *      text: Welcher Text soll auf das Thumbnail?
 *      color: Welche Farbe soll der Text haben?
 *      whitelist: Pfad zur Whitelist-Datei
 *      size: Die Schriftgröße
 */
function lineEnding($str) {
    if (strpos($str, "\r\n") !== false) return "\r\n";
    if (strpos($str, "\n") !== false) return "\n";
    return null;
  }
include("colorstringconvert.php");
if (!isset($_GET["path"]))
    die("Bitte gebe path an!");
if (!isset($_GET["recursive"]))
    die("Bitte gebe recursive an!");

if (!isset($_GET["whitelist"]))
    $whitelistpath = $_GET["path"]."/whitelist.txt";

if(!empty(file_get_contents($whitelistpath))) $whitelist = explode(lineEnding(file_get_contents($whitelistpath)), file_get_contents($whitelistpath));
else $whitelist=[];
if (isset($_GET["tn"])) {
    if (!isset($_GET["text"]))
        die("Bitte gebe text an!");
    else
        $text = $_GET["text"];

    if (!isset($_GET["color"]))
        $color = 0xFFFFFF;
    else
        $color = hexdec(color_name_to_hex($_GET["color"]));
}
if (isset($_GET["size"])) {
    $size = $_GET["size"];
} else {
    $size = 10;
}
$path = $_GET["path"];
$blacklist = ["@eaDir"];
$file_ext = ["jpg", "png", "gif"];
$tn = isset($_GET["tn"]);
$font = "./tnfont.ttf";

function getImages($path)
{
    global $blacklist, $file_ext, $whitelist;
    $images = [];
    foreach (scandir($path) as $value) {
        if (in_array($value, $blacklist))
            continue;
        if (is_dir($path . "/" . $value)) {
            if (!$_GET["recursive"] || $value == "." || $value == "..")
                continue;
            else
                $images=array_merge($images,getImages($path . "/" . $value));
        }
        if (!in_array(pathinfo($path . "/" . $value, PATHINFO_EXTENSION), $file_ext))
            continue;
        if ($whitelist != null) { // Whitelist angegeben: Prüfen, ob Element in der Whitelist ist
            if (in_array($path . "/" . $value, $whitelist)) { // Element ist in der Whitelist
                array_push($images, $path . "/" . $value); // Bild zur Auswahl hinzufügen
            }
        } else { // Keine Whitelist angegeben -> alles wird mit in die Auswahl gepackt
            $images[] = $path . "/" . $value;
        }
    }
    return $images;

}
$images = getImages($path);
$imagekey = array_rand($images);
$imagepath = $images[$imagekey];
if (pathinfo($imagepath, PATHINFO_EXTENSION) == "jpg")
    $image = imagecreatefromjpeg($imagepath);
// if (pathinfo($imagepath, PATHINFO_EXTENSION) == "png")
//     $image = imagecreatefrompng($imagepath);
// if (pathinfo($imagepath, PATHINFO_EXTENSION) == "gif")
//     $image = imagecreatefromgif($imagepath);
if ($tn) {
    $newsize = 0.02 * $size * imagesx($image);
    $tb = imagettfbbox($newsize, 0, $font, $text);
    $x = ceil((imagesx($image) - $tb[2]) / 2);
    $y = ceil((imagesy($image) - $tb[5]) / 2);
    imagettftext($image, $newsize, 0, $x, $y, $color, $font, $text);
}
imagepng($image);
imagedestroy($image);