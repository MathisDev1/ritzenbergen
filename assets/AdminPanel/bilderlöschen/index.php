<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whitelist auswählen</title>
</head>

<body>
    <form action="bilderauswaehlen.php">
        <input type="radio" name="images" value="../../../bilder/erntefest"> Alle Erntefeste <br>
        <input type="radio" name="images" value="../../../bilder/osterfeuer"> Alle Osterfeuer <br>
        <input type="radio" name="images" value="../../../bilder/doppelkopf"> Alle Doppelkopfturniere <br>
        <input type="radio" name="images" value="../../../bilder/fussball"> Alle Fußballturniere <br>
        <br>
        <?php
        $blacklist = [".", "..", "@eaDir", "whitelist.txt"];
        $erntefeste = scandir("../../../bilder/erntefest");
        for ($i = 0; $i < count($erntefeste); $i++) {
            if (!in_array($erntefeste[$i], $blacklist)) {
                echo "<input type=\"radio\" name=\"images\" value=\"../../../bilder/erntefest/" . $erntefeste[$i] . "\"> Erntefest " . $erntefeste[$i] . "<br>";
            }
        }
        echo "<br>";
        $osterfeuer = scandir("../../../bilder/osterfeuer");
        for ($i = 0; $i < count($osterfeuer); $i++) {
            if (!in_array($osterfeuer[$i], $blacklist)) {
                echo "<input type=\"radio\" name=\"images\" value=\"../../../bilder/osterfeuer/" . $osterfeuer[$i] . "\"> Osterfeuer " . $osterfeuer[$i] . "<br>";
            }
        }
        echo "<br>";
        $doppelkopf = scandir("../../../bilder/doppelkopf");
        for ($i = 0; $i < count($doppelkopf); $i++) {
            if (!in_array($doppelkopf[$i], $blacklist)) {
                echo "<input type=\"radio\" name=\"images\" value=\"../../../bilder/doppelkopf/" . $doppelkopf[$i] . "\"> Doppelkopf " . $doppelkopf[$i] . "<br>";
            }
        }
        echo "<br>";
        $fussball = scandir("../../../bilder/fussball");
        for ($i = 0; $i < count($fussball); $i++) {
            if (!in_array($erntefeste[$i], $blacklist)) {
                echo "<input type=\"radio\" name=\"images\" value=\"../../../bilder/fussball/" . $fussball[$i] . "\"> Fußballturnier " . $fussball[$i] . "<br>";
            }
        }

        ?>
        <!-- <input type="radio" name="images" value="../../../bilder/erntefest/1982"> Erntefest 1982<br>
        <input type="radio" name="images" value="../../../bilder/erntefest/2002"> Erntefest 2002<br> -->
        <br>
        <input type="submit" value="Auswählen">
    </form>
</body>

</html>