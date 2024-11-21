<?php
include("../../../../mysqlverbinden.php");
include("../../../rowforeach.php");
include("../header.php");
if ($valid) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Benutzer hinzufügen</title>
    </head>

    <body>
        <?php
        if (!isset($_POST["newusername"]))
            die("POST newusername fehlt");
        $newusername = $_POST["newusername"];

        if (!isset($_POST["newpassword"]))
            die("POST newpassword fehlt");
        $newpassword = $_POST["newpassword"];

        if (!isset($_POST["newpassword2"]))
            die("POST newpassword2 fehlt");
        $newpassword2 = $_POST["newpassword2"];

        if ($newpassword != $newpassword2)
            die("Passwörter sind nicht gleich!");

        $result=mysqli_execute_query($db_id, "INSERT INTO `buli-user` (`username`, `password`) VALUES (?,?);",[$newusername,$newpassword]);
        echo "Benutzer ".$newusername." mit Passwort-Hash ".$newpassword." wird eingefügt. MySQL Antwort: <br>";
        var_dump($result);
        ?>
    </body>

    </html>

    <?php
}
include("../footer.php");
?>