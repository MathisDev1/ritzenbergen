<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>BuLi-Punkte</title>
</head>
<body>
    <?php
    include("../mysqlverbinden.php");
    include("./rowforeach.php");
    
    $ansichten=["spiel"];

    if(!isset($_GET["spieltag"])) die("GET spieltag fehlt");
    $spieltag=$_GET["spieltag"];
    
    if(!isset($_GET["paarung"])) die("GET paarung fehlt");
    $paarungid=$_GET["paarung"];
    
    if(!isset($_GET["detail"])) die("GET detail fehlt");
    $detail=$_GET["detail"];
    if(!in_array($detail,$ansichten)) die("Ungültige Ansicht");
    
    
    function getTipp($name,$spieltag,$paarungid){
        $tippQueryResult=srowforeach("SELECT tipp from `buli-tipp` where user=? AND spieltag=?;",[$name,$spieltag]);
        if(count($tippQueryResult)==0) return null; 
        $tipps=json_decode($tippQueryResult[0][0],true);
        $paarung=srowforeach("SELECT heim, gast from `buli-paarungen` where `id`=?;",[$paarungid])[0];
        
        foreach ($tipps as $key => $value) { // $tipp aus den ganzen Tipps rausfischen
            $mannschaften=array_keys($value);
            if($mannschaften[0]==$paarung[0] && $mannschaften[1]==$paarung[1]) $tipp=$value;
        }
        // $tipp mannschaft => punkte
        // $punktetipp[0] heim, $punktetipp[1] gast
        $punktetipp=[$tipp[$paarung[0]],$tipp[$paarung[1]]];
        
        return $punktetipp;
        
    }

    function ps($name,$spieltag,$paarungid){
        $punkte=srowforeach("SELECT score1, score2 from `buli-results` where `paarung`=? AND spieltag=?;",[$paarungid,$spieltag])[0];
        $punktetipp=getTipp($name,$spieltag,$paarungid);

        if($punktetipp==null) return 0;

        if($punkte==$punktetipp) return 3;

        if($punkte[0]>$punkte[1]) $differenz=$punkte[0]-$punkte[1];
        else $differenz=$punkte[1]-$punkte[0];

        if($punktetipp[0]>$punktetipp[1]) $differenztipp=$punktetipp[0]-$punktetipp[1];
        else $differenztipp=$punktetipp[1]-$punktetipp[0];
        
        if($differenz==$differenztipp) return 2;
        
        if($punktetipp[0]==$punktetipp[1] || $punkte[0]==$punkte[1]){
            // Unentschieden
            return 0;
        }

        $siegertipp=$punktetipp[0]>$punktetipp[1]; // true, wenn der Sieger der 1. ist
        $sieger=$punkte[0]>$punkte[1]; // true, wenn der Sieger der 1. ist

        if($sieger==$siegertipp) return 1;
        return 0;
    }

    function ts($name,$spieltag){
        $punkte=0;
        foreach (srowforeach("SELECT `id` from `buli-paarungen` where spieltag=?;",[$spieltag]) as $key => $value) {
            $punkte+=ps($name,$spieltag,$value[0]);
        }
        return $punkte;
    }

    function gs($name,$spieltagmax){
        $punkte=0;

        for($i=0;$i<$spieltagmax;$i++){
            $punkte+=ts($name,$i+1);
        }

        return $punkte;
    }
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td>Tipp</td>
            <td>Punkte</td>
            <td>Gesamtpunkte</td>
        </tr>
        <?php
        foreach (rowforeach("SELECT `username` from `buli-user`;") as $key => $value) {
            $name=$value[0];
            $punkte=ps($name,$spieltag,$paarungid);
            $gesamtpunkte=gs($name,$spieltag);
            $tipp=getTipp($name,$spieltag,$paarungid);
            $tippstr=($tipp==null)?"-":$tipp[0]." - ".$tipp[1];
            ?>
            
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $tippstr; ?></td>
            <td><?php echo $punkte; ?></td>
            <td><?php echo $gesamtpunkte; ?></td>
        </tr>
            
        <?php
        }
        ?>
    </table>
</body>
</html>