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
 */
include("colorstringconvert.php");
if (!isset($_GET["path"]))
    die("Bitte gebe path an!");
if (!isset($_GET["recursive"]))
    die("Bitte gebe recursive an!");
if (!isset($_GET["whitelist"]))
    $whitelist = null;
else
    $whitelist = explode("\r\n",file_get_contents($_GET["whitelist"]));
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
$path = $_GET["path"];
$blacklist = [];
$file_ext = ["jpg", "png", "gif"];
$tn = isset($_GET["tn"]);
$font = "tnfont.ttf";

function getImage($path)
{
    global $blacklist, $file_ext, $tn, $font, $color, $text, $whitelist;
    $images = [];
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
        if ($whitelist != null) { // Whitelist angegeben: Prüfen, ob Element in der Whitelist ist
            if (in_array($path . "/" . $value, $whitelist)) { // Element ist in der Whitelist
                array_push($images,$path . "/" . $value); // Bild zur Auswahl hinzufügen
            }
        } else { // Keine Whitelist angegeben -> alles wird mit in die Auswahl gepackt
            $images[] = $path . "/" . $value;
        }
    }
    $imagekey = array_rand($images);
    $imagepath = $images[$imagekey];
    $image = imagecreatefromjpeg($imagepath);
    if ($tn) {
        $size = 100;
        $tb = imagettfbbox($size, 0, $font, $text);
        $x = ceil((imagesx($image) - $tb[2]) / 2);
        $y = ceil((imagesy($image) - $tb[3]) / 2);
        imagettftext($image, $size, 0, $x, $y, $color, $font, $text);
    }
    imagepng($image);
    imagedestroy($image);

}
getImage($path);