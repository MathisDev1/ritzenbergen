<?php
include("../mysqlverbinden.php");
include("rowforeach.php");

if(!isset($_GET["team"])) die("GET team fehlt");
$team=$_GET["team"];

header("Content-Type: img/png");

echo srowforeach("SELECT `img` from `buli-icons` where `team`=?;",[$team])[0][0];