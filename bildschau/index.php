

























<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Fehler anzeigen lassen
    error_reporting(0);

    // mysql verbinden
    include("../../mysqlverbinden.php");

    // Funktion rowforeach einbinden
    include("./phpscripts/rowforeach.php");

    // Kurzen Titel setzen
    $titel_short = "Fotos";

    // langen Titel setzen
    $titel = "Fotos - ritzenbergen.de";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $titel_short; ?>
    </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/kommentarOptik.css">
    <link rel="stylesheet" href="./js-scripts/lazyloading.css">
    <script src="./js-scripts/getURLData.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="main">
        <section class="flex-card-wrapper">
            <?php
            $bilderpath = "../bilder/" . $_GET["path"];
            $bilder = scandir($bilderpath);

            $i = 0;
            $bilder2 = array();
            $bilder_mit_kommentar = array();
            foreach (scandir($bilderpath) as $key => $value) {
                if ($value == "." || $value == ".." || $value == "@eaDir" || pathinfo($value, PATHINFO_EXTENSION) == "txt") {
                    continue;
                }
                array_push($bilder2, $value);
            }
            $kommentare = array();
            foreach (rowforeach("SELECT * from fotoscomments") as $j => $row) {
                array_push($bilder_mit_kommentar, $row[3]);
            }
            array_unique($bilder_mit_kommentar);
            foreach ($bilder_mit_kommentar as $key => $value) {
                $aktuellerkommentar="";
                foreach (rowforeach("SELECT * from fotoscomments where bildpfad='$value'") as $j => $row) {
                    $aktuellerkommentar .= "<p class=\"comments\">" . $row[1] . ": " . $row[2] . "</p>";
                }
                $kommentare[$value]=$aktuellerkommentar;
            }
            foreach ($bilder as $key => $filename) {
                if ($filename == "@eaDir" || $filename == "." || $filename == ".." || $filename == "Thumbs.db" || pathinfo($filename, PATHINFO_EXTENSION) == "txt") {
                    continue;
                }
                $value = $bilderpath . "/" . $filename;
                $bilderlen = count($bilder2);
                if ($i == 0) {
                    $datastring = "2";
                } elseif ($i == $bilderlen) {
                    $datastring = (string) $i;
                } else {
                    $datastring = $i . "-" . ($i + 2);
                }
                if (in_array($value, $bilder_mit_kommentar)) {
                    $kommentar = $kommentare[$value];
                } else {
                    $kommentar = "";
                }
                /**
                 * data-title: Nummer des Bildes
                 * data-id: Die Bilder davor und danach
                 * data-name: Kommentare
                 * data-src: Pfad zu den Bildern
                 */
                echo "<article class=\"flex-card-container lazy-loading" . (($i==$_GET["bild"]) ? " active" : "") . ((($i == $_GET["bild"] - 1) || ($i == $_GET["bild"] + 1)) ? " unactive" : "") . "\" data-title=\"" . $i . "\" data-id=\"" . $datastring . "\" data-name=\"" . htmlentities($kommentar) . "\" data-src=\"" . $bilderpath . "/" . $filename . "\"></article>";
                $i++;
            }
            ?>
        </section>
        <br><br>
        <p id="info">Info: Bilder sehen aufgrund der automatischen skalierung auf größeren Bildschirmen besser aus.</p>
        <div class="kommentare"></div>

            <form class="formular" action="kommentareintragen.php" method="post">
            <input class="username-input" type="text" name="username" placeholder="Name"> <br>
            <input class="kommentar-input" type="text" name="kommentar" placeholder="Kommentar">
            <input type="hidden" name="bildpfad" class="bilderpath" value="<?php echo $bilderpath . $bilder2[$_GET["bild"]]; ?>">
            <input type="hidden" name="bild" value="<?php echo $_GET["bild"]; ?>" class="bildform">
            <input class="absenden-button" type="submit" value="Absenden">
            </form>
    </div>
    <script src="main.js"></script>
</body>

</html>