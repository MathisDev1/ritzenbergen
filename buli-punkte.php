<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>BuLi-Punkte</title>
</head>
<body>
    <?php
    include("../mysqlverbinden.php");
    include("./rowforeach.php");
    
    $ansichten=["spiel"];

    if(!isset($_GET["spieltag"])) die("GET spieltag fehlt");
    $spieltag=$_GET["spieltag"];
    
    if(!isset($_GET["paarung"])) die("GET paarung fehlt");
    $paarungid=$_GET["paarung"];
    
    if(!isset($_GET["detail"])) die("GET detail fehlt");
    $detail=$_GET["detail"];
    if(!in_array($detail,$ansichten)) die("Ungültige Ansicht");
    
    include("./buli.inc.php");
    
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td>Tipp</td>
            <td>Punkte</td>
            <td>Gesamtpunkte</td>
        </tr>
        <?php
        foreach (rowforeach("SELECT `username` from `buli-user`;") as $key => $value) {
            $name=$value[0];
            $punkte=ps($name,$spieltag,$paarungid);
            $gesamtpunkte=gs($name,$spieltag);
            $tipp=getTipp($name,$spieltag,$paarungid);
            $tippstr=($tipp==null)?"-":$tipp[0]." - ".$tipp[1];
            ?>
            
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $tippstr; ?></td>
            <td><?php echo $punkte; ?></td>
            <td><?php echo $gesamtpunkte; ?></td>
        </tr>
            
        <?php
        }
        ?>
    </table>
</body>
</html>