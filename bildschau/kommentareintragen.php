<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Fehler anzeigen lassen
    error_reporting(-1);

    // mysql verbinden
    include("../../mysqlverbinden.php");

    // Kurzen Titel setzen
    $titel_short = "Fotos";

    // langen Titel setzen
    $titel = "Kommentar wird eingetragen, bitte warten...";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $titel_short; ?>
    </title>
    <link rel="stylesheet" href="css/kommentar.min.css">
</head>

<body>
    <div class="main">
        <div class="loader">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
            <div class="circle5"></div>
            <div class="circle6"></div>
        </div>
        <?php


        if(strlen(trim($_POST["username"]))==0) die("Name leer!");
        if(strlen(trim($_POST["kommentar"]))==0) die("Kommentar leer!");
        if(strlen($_POST["kommentar"])>1024) die("Maximale Kommentarlänge von 1024 überschritten!");
        if(strlen($_POST["username"])>32) die("Maximale Namenslänge von 32 überschritten!");
        mysqli_execute_query($db_id, "INSERT INTO fotoscomments (schreiber,kommentar,bildpfad) VALUES (?,?,?);",[$_POST["username"], $_POST["kommentar"],$_POST["bildpfad"]]);
        ?>
        <script>
            window.location.href = "../bildschau.php?bild=<?php echo $_POST["bild"]; ?>&path=<?php echo substr(dirname($_POST["bildpfad"]), 9); ?>";
        </script>
    </div>
</body>

</html>