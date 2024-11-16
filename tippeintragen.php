<?php

if(!isset($_POST["user"])) die("POST user fehlt");
$user=$_POST["user"];

if(!isset($_POST["pass"])) die("POST pass fehlt");
$pass=$_POST["pass"];

if(!isset($_POST["spieltag"])) die("POST spieltag fehlt");
$spieltag=$_POST["spieltag"];

if(!isset($_POST["tipp"])) die("POST tipp fehlt");
$tipp=$_POST["tipp"];

include("./check-buli-password.php");
if(!$valid) die("Falsches Passwort!");

include("getTipp.php");
if(count($tippQueryResult)>0) die("Du hast bereits getippt!");

include("../mysqlverbinden.php");
include("./rowforeach.php");
function deadline($spieltag,$heim,$gast){ // Gibt true zurück, wenn die Deadline noch nicht überschritten ist.
    $deadline=srowforeach("SELECT deadline from `buli-paarungen` where spieltag=? AND heim=? AND gast=?;",[$spieltag,$heim,$gast])[0][0];
    date_default_timezone_set('Europe/Berlin');

    return strtotime($deadline)<time();
}

if(!deadline($spieltag,$heim,$gast)) die("Deadline überschritten!");

mysqli_execute_query($db_id,"INSERT INTO `buli-tipp` (spieltag,`user`,tipp) VALUES (?,?,?);",[$spieltag,$user,$tipp]);

