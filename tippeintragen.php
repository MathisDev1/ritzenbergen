<?php

if(!isset($_POST["user"])) die("POST user fehlt");
$user=$_POST["user"];

if(!isset($_POST["pass"])) die("POST pass fehlt");
$pass=$_POST["pass"];

if(!isset($_POST["spieltag"])) die("POST spieltag fehlt");
$spieltag=$_POST["spieltag"];

if(!isset($_POST["tipp"])) die("POST tipp fehlt");
$tipp=$_POST["tipp"];

include("../mysqlverbinden.php");
include("./rowforeach.php");

include("./check-buli-password.php");
if(!$valid) die("Falsches Passwort!");

include("getTipp.php");
if(count($tippQueryResult)>0) die("Du hast bereits getippt!");

function deadline($spieltag){ // Gibt true zurück, wenn die Deadline überschritten ist.
    $deadline=srowforeach("SELECT deadline from `buli-paarungen` where spieltag=?;",[$spieltag])[0][0];
    date_default_timezone_set('Europe/Berlin');

    return strtotime($deadline)<time();
}

if(deadline($spieltag)) die("Deadline überschritten!");


mysqli_execute_query($db_id,"INSERT INTO `buli-tipp` (spieltag,`user`,tipp) VALUES (?,?,?);",[$spieltag,$user,json_encode($tipp,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)]);

