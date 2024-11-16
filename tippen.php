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
    if(!isset($_POST["spieltag"])) die("POST spieltag fehlt");
    $spieltag=$_POST["spieltag"];

    if(!isset($_POST["user"])) die("POST user fehlt");
    $user=$_POST["user"];

    if(!isset($_POST["pass"])) die("POST pass fehlt");
    $pass=$_POST["pass"];

    
    include("check-buli-password.php"); // BuLi Passwort überprüfen => $valid Variable wird gesetzt

    if(!$valid){

    ?>
    <!-- Falsches Passwort, Fehler! -->
    <h1>Falsches Passwort!!!</h1>

    <?php
    }else{
    ?>
    
    <!-- Richtiges Passwort, weitermachen -->
    <div>
        <?php
        include("getTipp.php");
        if(count($tipp)>0){
            // Benutzer hat bereits getippt
            ?>
            
            <!-- Benutzer hat bereits getippt, Tipp anzeigen -->
            <div>

            </div>

            
            <?php
        }else{
            ?>
            
            <!-- Benutzer hat noch nicht getippt - Tippen! -->

            <div>
                <form action="">

                </form>
            </div>
            
            
            <?php
        }
        
        ?>
    </div>

    <?php
    
    }
    
    ?>
</body>
</html>