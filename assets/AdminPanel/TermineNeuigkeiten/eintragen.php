<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintragen in Datenbank...</title>
</head>
<body>
    Das Event wird eingetragen. <br>
    <?php
        include("../../../../mysqlverbinden.php");
        
        print_r($_POST);
        $eventname=$_POST["ueberschrift"];
        $datum=$_POST["datum"];
        $type=$_POST["box"];
        $content=$_POST["inhalt"];
        $link=($_POST["link"]=="")?null:$_POST["link"];
        $foto=$_POST["foto"];
        if($foto=="") mysqli_execute_query($db_id, "INSERT INTO `ritzenbergen-events` (eventname, datum, `type`, content, link) VALUES (?,?,?,?,?)",[$eventname, $datum, $type, $content, $link]);
        else mysqli_execute_query($db_id, "INSERT INTO `ritzenbergen-events` (eventname, datum, `type`, content, link, foto) VALUES (?,?,?,?,?,?)",[$eventname, $datum, $type, $content, $link, $foto]);
    ?>
    <br>
    <a href="../../../#news-1-u6k7q0xyDG">Ansehen</a>
</body>
</html>