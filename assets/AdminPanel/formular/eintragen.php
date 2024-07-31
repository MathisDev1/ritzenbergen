<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if (!$valid) {
    die("<h1>Falsches Passwort!</h1>");
}
if (!isset($_POST["type"]))
    die("POST type fehlt");

$type = $_POST["type"];
if ($type == "add") {
    if (!isset($_POST["ueberschrift"]))
        die("POST ueberschrift fehlt");
    $ueberschrift = $_POST["ueberschrift"];

    if (!isset($_POST["inhalt"]))
        die("POST inhalt fehlt");
    $inhalt = $_POST["inhalt"];

    if (!isset($_POST["minitext"]))
        die("POST minitext fehlt");
    $minitext = $_POST["minitext"];

    if (!isset($_POST["labelone"]))
        die("POST labelone fehlt");
    $labelone = $_POST["labelone"];
    
    if(!isset($_POST["labeltwo"])) 
        die("POST labeltwo fehlt");
    $labeltwo=$_POST["labeltwo"];

    if(!isset($_POST["link"])) 
        die("POST link fehlt");
    $link=$_POST["link"];
    
    $link=($link=="")?null:$link;

    echo "Überschrift: ".$ueberschrift."<br>";
    echo "Minitext: ".$minitext."<br>";
    echo "Label 1: ".$labelone."<br>";
    echo "Label 2: ".$labeltwo."<br>";
    echo "Inhalt: ".$inhalt."<br>";
    echo "Link: ".$link;

    mysqli_execute_query($db_id,"INSERT INTO `ritzenbergen-formulare` (ueberschrift,minitext,inhalt,labelone,labeltwo,`link`) VALUES (?,?,?,?,?,?);",[$ueberschrift,$minitext,$inhalt,$labelone,$labeltwo,$link]);
}
?>