<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>

<?php

if(isset($_POST["ueberschrift"])) $ueberschrift=$_POST["ueberschrift"];
else die("POST ueberschrift fehlt");

if(isset($_POST["labelone"])) $labelone=$_POST["labelone"];
else die("POST labelone fehlt");

if(isset($_POST["minitext"])) $minitext=$_POST["minitext"];
else die("POST minitext fehlt");

if(isset($_POST["inhalt"])) $inhalt=$_POST["inhalt"];
else die("POST inhalt fehlt");

if(isset($_POST["labeltwo"])) $labeltwo=$_POST["labeltwo"];
else die("POST labeltwo fehlt");

if(isset($_POST["link"])) $link=$_POST["link"];
else die("POST link fehlt");

if(isset($_POST["id"])) $id=$_POST["id"];
else die("POST id fehlt");

echo "Überschrift: ".$ueberschrift."<br>";
echo "Text 1: ".$labelone."<br>";
echo "Text 2: ".$labeltwo."<br>";
echo "Minitext: ".$minitext."<br>";
echo "Beschreibung: ".$inhalt."<br>";
echo "Link: ".$link."<br>";

mysqli_execute_query($db_id,"UPDATE `ritzenbergen-formulare` SET `ueberschrift`=?, `link`=?, `minitext`=?, `inhalt`=?, `labelone`=?, `labeltwo`=? where `id`=?;",[$ueberschrift,$link,$minitext,$inhalt,$labelone,$labeltwo,$id]);

?>
<?php
}
include ("../footer.php");
?>