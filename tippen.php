<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippen</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/bulitipp2.css">
<<<<<<< HEAD
    
    <style>
                                    img{
                                        width: 30px;
                                    }
                                </style>
=======

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
>>>>>>> 1cb39faaec9c1f034a87001edee3a68afdb494f5
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
            $userid=srowforeach("SELECT `id` from `buli-user` where `username`=?;",[$user])[0][0];
            if (count(srowforeach("SELECT `id` from `buli-tipps` where user=? AND spieltag=?;",[$userid,$spieltag])) > 0) {
                // Benutzer hat bereits getippt
                ?>

                <!-- Benutzer hat bereits getippt, Tipp anzeigen -->
                <div class="TippsAnzeigen">
                    <h1>Du hast bereits getippt. Das sind deine Tipps:</h1>
                    <table>
                        <?php
                        $tippids=srowforeach("SELECT tipp1,tipp2,tipp3,tipp4,tipp5,tipp6,tipp7,tipp8,tipp9 from `buli-tipps` where `user`=? AND `spieltag`=?;",[$userid,$spieltag])[0];
                        for ($i=0;$i<9;$i++) {
                            $tippid=$tippids[$i];
                            $sqlresult=srowforeach("SELECT `paarung`, `score1`, `score2` from `buli-tipp` where `id`=?;",[$tippid])[0];
                            $paarungsid=$sqlresult[0];
                            $heimscore=$sqlresult[1];
                            $gastscore=$sqlresult[2];
                            $paarung=srowforeach("SELECT `heim`, `gast` from `buli-paarungen` where `id`=?;",[$paarungsid])[0];
                            $heim=$paarung[0];
                            $gast=$paarung[1];
                            ?>
                            <tr>
                            <td><img src="./get-buli-image.php?team=<?php echo $paarung[0]; ?>" alt=""><?php echo $heim; ?></td>
                                <td><?php echo $gast; ?><img src="./get-buli-image.php?team=<?php echo $paarung[1]; ?>" alt=""></td>
                            </tr>
                            <tr>
                            
                                <td><?php echo $heimscore; ?></td><td><?php echo $gastscore; ?></td>
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

                <div class="tippenEintragen">
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
                                <img src="./get-buli-image.php?team=<?php echo $heim; ?>" alt="">
                                    <input type="number" min="0" placeholder="<?php echo $heim; ?>" class="score"> : <input
                                        type="number" placeholder="<?php echo $gast; ?>" min="0" class="score"><img src="./get-buli-image.php?team=<?php echo $gast; ?>" alt=""><br>
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