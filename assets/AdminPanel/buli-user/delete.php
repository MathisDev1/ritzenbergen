<?php
include("../../../../mysqlverbinden.php");
include("../../../rowforeach.php");
include("../header.php");

if(!$valid) die("Falsches Passwort");

if(!isset($_POST["id"])) die("POST id fehlt");
$id=$_POST["id"];

var_dump(mysqli_execute_query($db_id,"DELETE from `buli-user` where `id`=?;",[$id]));