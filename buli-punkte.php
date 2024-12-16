<link rel="stylesheet" href="./assets/css/bulitipp2.css">

    <?php
    include("../mysqlverbinden.php");
    include("./rowforeach.php");
    
    $ansichten=["spiel","user"];

    if(!isset($_GET["spieltag"])) die("GET spieltag fehlt");
    $spieltag=$_GET["spieltag"];
    
    if(!isset($_GET["paarung"])) die("GET paarung fehlt");
    $paarungid=$_GET["paarung"];
    
    if(!isset($_GET["detail"])) die("GET detail fehlt");
    $detail=$_GET["detail"];

    if(!isset($_GET["name"])) die("GET name fehlt");
    $name=$_GET["name"];

    if(!in_array($detail,$ansichten)) die("Ungültige Ansicht");
    
    include("./buli-inc.php");
    if($detail=="spiel"){
    ?>
    <table class="paarungPunkte">
        <tr class="paarungPunkte">
            <td  class="paarungPunkte">Name</td>
            <td  class="paarungPunkte">Tipp</td>
            <td class="paarungPunkte">Punkte</td>
            <td class="paarungPunkte">Gesamtpunkte</td>
        </tr>
        <?php
        foreach (rowforeach("SELECT `username` from `buli-user`;") as $key => $value) {
            $name=$value[0];
            $punkte=ps($name,$spieltag,$paarungid);
            $gesamtpunkte=gs($name,$spieltag);
            $tipp=getTipp($name,$spieltag,$paarungid);
            $tippstr=($tipp==null)?"-":$tipp[0]." - ".$tipp[1];
            ?>
            
        <tr class="paarungPunkte">
            <td class="paarungPunkte"><?php echo $name; ?></td>
            <td class="paarungPunkte"><?php echo $tippstr; ?></td>
            <td class="paarungPunkte"><?php echo $punkte; ?></td>
            <td class="paarungPunkte"><?php echo $gesamtpunkte; ?></td>
        </tr>
        
    </table>    
        <?php
        
        }
        ?>
    <?php
    }else if($detail=="user"){
        ?>
        <h1>Detailansicht für <?php echo $name; ?>, <?php echo $spieltag; ?>. Spieltag</h1>
        <table>
            <tr>
                <td>Tipp von <?php echo $name; ?></td>
                <td>Ergebnis</td>
                <td>Tipp</td>
                <td>Punkte</td>
            </tr>
            <?php
            foreach(srowforeach("SELECT paarung, score1, score2 from `buli-results` where spieltag=?;",[$spieltag]) as $key=>$value){
                $id=$value[0];
                $score1=$value[1];
                $score2=$value[2];
                $tipp=getTipp($name,$spieltag,$id);
                $paarungQuery=srowforeach("SELECT heim, gast from `buli-paarungen` where id=?;",[$id])[0];
                $heim=$paarungQuery[0];
                $gast=$paarungQuery[1];
                $punkte=ps($name,$spieltag,$id);
                $tippstr=($tipp==null)?"-":$tipp[0]." - ".$tipp[1];
                ?>
            <tr>
                <td><?php echo $heim; ?> - <?php echo $gast; ?></td>
                <td><?php echo $score1; ?> - <?php echo $score2; ?></td>
                <td><?php echo $tippstr; ?></td>
                <td><?php echo $punkte; ?></td>
            </tr>
                
            <?php
            }
            ?>
        </table>
        
    <?php
    }
    ?>