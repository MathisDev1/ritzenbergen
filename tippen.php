<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippen</title>
</head>

<body>
    <?php

    include("../mysqlverbinden.php");
    include("rowforeach.php");



    // Variablen aus POST holen, oder die();
    if (!isset($_POST["spieltag"]))
        die("POST spieltag fehlt");
    $spieltag = $_POST["spieltag"];

    if (!isset($_POST["user"]))
        die("POST user fehlt");
    $user = $_POST["user"];

    if (!isset($_POST["pass"]))
        die("POST pass fehlt");
    $pass = $_POST["pass"];


    include("check-buli-password.php"); // BuLi Passwort überprüfen => $valid Variable wird gesetzt
    
    if (!$valid) {

        ?>
        <!-- Falsches Passwort, Fehler! -->
        <h1>Falsches Passwort!!!</h1>

        <?php
    } else {
        ?>

        <!-- Richtiges Passwort, weitermachen -->
        <div>
            <?php
            include("getTipp.php");
            if (count($tippQueryResult) > 0) {
                // Benutzer hat bereits getippt
                ?>

                <!-- Benutzer hat bereits getippt, Tipp anzeigen -->
                <div>

                </div>


                <?php
            } else {
                ?>

                <!-- Benutzer hat noch nicht getippt - Tippen! -->

                <div>
                    <form onsubmit="return false;" action="tippeintragen.php" id="mainform">
                        <?php
                        $paarungen = srowforeach("SELECT heim, gast from `buli-paarungen` where spieltag=?;", [$spieltag]);
                        if (count($paarungen) > 0) {
                            // Spieltag ist in der Datenbank eingetragen
                            for ($i = 0; $i < 9; $i++) {
                                $heim = $paarungen[$i][0];
                                $gast = $paarungen[$i][1];
                                ?>
                                <span class="paarung">
                                <input type="number" min="0" placeholder="<?php echo $heim; ?>" class="score"> : <input type="number"
                                    placeholder="<?php echo $gast; ?>" min="0" class="score"><br>
                                    </span>
                                <?php
                            }
                        }else{
                            // Spieltag ist noch nicht in der Datenbank
                            ?>
                            
                            <h1>BuLi-Tipp ist noch nicht für diesen Spieltag vorbereitet worden... Versuch es wannanders nochmal!</h1>

                            <?php
                        }

                        ?>
                        <input type="submit" value="Tippen">
                    </form>
                </div>


                <?php
            }

            ?>
        </div>

        <?php

    }

    ?>
    <script src="tippen.js"></script>
</body>

</html>