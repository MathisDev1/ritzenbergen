<?php
include("../mysqlverbinden.php");
if(isset($_POST["name"])) $labelone=$_POST["name"];
else die("POST name fehlt");
if(isset($_POST["textarea"])) $labeltwo=$_POST["textarea"];
else die("POST textarea fehlt");
if(isset($_POST["id"])) $id=$_POST["id"];
else die("POST id fehlt");
mysqli_execute_query($db_id,"INSERT INTO `ritzenbergen-formular-ergebnisse` (`formularid`,`labelone`,`labeltwo`) VALUES (?,?,?);",[$id,$labelone,$labeltwo]);
?>
<script>window.location.href=".";</script>