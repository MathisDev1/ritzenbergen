<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippen</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
            include("buli-inc.php");
            if (count(srowforeach("SELECT `id` from `buli-tipp` where user=? AND spieltag=?;",[$user,$spieltag])) > 0) {
                // Benutzer hat bereits getippt
                ?>

                <!-- Benutzer hat bereits getippt, Tipp anzeigen -->
                <div>
                    <h1>Du hast bereits getippt. Das sind deine Tipps:</h1>
                    <table>
                        <?php
                        
                                                    
                        foreach (json_decode(srowforeach("SELECT tipp from `buli-tipp` where `user`=? AND spieltag=?;",[$user,$spieltag])[0][0],true) as $key => $value) {
                            $heim=array_keys($value)[0];
                            $gast=array_keys($value)[1];
                            $heimscore=$value[$heim];
                            $gastscore=$value[$gast];
                            ?>
                            <tr>
                                <td><?php echo $heim; ?></td>
                                <td><?php echo $gast; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $heimscore; ?></td>
                                <td><?php echo $gastscore; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
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
                                    <input type="number" min="0" placeholder="<?php echo $heim; ?>" class="score"> : <input
                                        type="number" placeholder="<?php echo $gast; ?>" min="0" class="score"><br>
                                </span>
                                <?php
                            }
                        } else {
                            // Spieltag ist noch nicht in der Datenbank
                            ?>

                            <h1>BuLi-Tipp ist noch nicht für diesen Spieltag vorbereitet worden... Versuch es wannanders nochmal!
                            </h1>

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
    <script>
        var username = `<?php echo $user; ?>`;
        var password = `<?php echo $pass; ?>`;
        var spieltag = <?php echo $spieltag; ?>;
    </script>
    <script src="tippen.js"></script>
</body>

</html>