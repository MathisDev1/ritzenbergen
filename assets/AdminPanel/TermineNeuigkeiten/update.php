<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintragen in Datenbank...</title>
</head>
<body>
    Das Event wird aktualisiert. <br>
    <?php
        
        $eventname=$_POST["ueberschrift"];
        $datum=$_POST["datum"];
        $type=$_POST["box"];
        $content=$_POST["inhalt"];
        $link=($_POST["link"]=="")?null:$_POST["link"];
        $foto=$_POST["foto"]; 
        if (!isset($_POST["id"])) die("POST id fehlt");
        $id=$_POST["id"];
        mysqli_execute_query($db_id, "UPDATE `ritzenbergen-events` SET eventname = ?, datum = ?, `type` = ?, content = ?, link = ?, foto=? WHERE id = ?",[$eventname, $datum, $type, $content, $link, $foto,$id]); 
    ?>
    <br>
    <a href="../../../#news-1-u6k7q0xyDG">Ansehen</a>
</body>
</html>
<?php
}
include ("../footer.php");
?>