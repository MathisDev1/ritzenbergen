<?php

if (!isset($_POST["user"]))
    die("POST user fehlt");
$user = $_POST["user"];

if (!isset($_POST["pass"]))
    die("POST pass fehlt");
$pass = $_POST["pass"];

if (!isset($_POST["spieltag"]))
    die("POST spieltag fehlt");
$spieltag = $_POST["spieltag"];

if (!isset($_POST["tipp"]))
    die("POST tipp fehlt");
$tipp = $_POST["tipp"];

include("../mysqlverbinden.php");
include("./rowforeach.php");

include("./check-buli-password.php");
if (!$valid)
    die("Falsches Passwort!");

include("buli-inc.php");
$userid=srowforeach("SELECT `id` from `buli-user` where `username`=?;",[$user])[0][0];
if (count(srowforeach("SELECT `id` from `buli-tipps` where user=? AND spieltag=?;", [$user, $spieltag])) > 0)
    die("Du hast bereits getippt!");


if (deadline($spieltag))
    die("Deadline überschritten!");


$ids = [];
foreach ($tipp as $key => $value) {
    $heim = array_keys($value)[0];
    $gast = array_keys($value)[1];
    $score1 = $value[$heim];
    $score2 = $value[$gast];
    $paarungsid =srowforeach("SELECT `id` from `buli-paarungen` where `heim`=? AND `gast`=? AND `spieltag`=?;",[$heim,$gast,$spieltag])[0][0];
    mysqli_execute_query($db_id, "INSERT INTO `buli-tipp` (`spieltag`,`paarung`,`score1`,`score2`) VALUES (?,?,?,?);", [$spieltag, $paarungsid, $score1, $score2]);
    array_push($ids, mysqli_insert_id($db_id));
}

mysqli_execute_query($db_id,"INSERT INTO `buli-tipps` (`user`,tipp1,tipp2,tipp3,tipp4,tipp5,tipp6,tipp7,tipp8,tipp9, spieltag) VALUES (?,?,?,?,?,?,?,?,?,?,?)",[$userid,$ids[0],$ids[1],$ids[2],$ids[3],$ids[4],$ids[5],$ids[6],$ids[7],$ids[8],$spieltag]);