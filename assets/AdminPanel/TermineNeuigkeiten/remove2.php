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
        <title>Wird gelöscht...</title>
    </head>

    <body>
        Das Event wird gelöscht...
        <?php
        if (!isset($_POST["id"]))
            die("POST id fehlt");
        $id = $_POST["id"];
        mysqli_execute_query($db_id, "DELETE FROM `ritzenbergen-events` WHERE id = ?", [$id]);
        ?>
        <br>
        <a href="../../../#news-1-u6k7q0xyDG">Ansehen</a>
    </body>

    </html>
    <?php
}
include("../footer.php");
?>