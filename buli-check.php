<?php
include("../mysqlverbinden.php");
include("./rowforeach.php");
include("buli-inc.php");

$bundesliga = 1; //TODO aus Datei holen
$year = date("Y");

// HTTP-Request ausführen
// Ergebnisse holen
$response = file_get_contents("https://api.openligadb.de/getmatchdata/bl".$bundesliga."/".$year."/".getmaxspieltag()+1, false);


if ($response === false) {
    echo "<script>window.alert(`Fehler beim HTTP-Request (Z.15)! Bitte einen Admin kontaktieren! BuLi-Tipp Daten konnten nicht aktualisiert werden.`);</script>";
}

$responseData = json_decode($response, true); // Response auswerten
if ($responseData) {
    // Response-Data ist ok
    $spieltag=getmaxspieltag()+1;
    foreach ($responseData as $key => $match) {
        if ($match["matchIsFinished"]) {
            // Spiel beendet, Ergebnisse in die Datenbank eintragen
            //TODO
            $heim=$match["team1"]["shortName"];
            $gast=$match["team2"]["shortName"];
            $paarungsid=srowforeach("SELECT `id` from `buli-paarungen` where spieltag=? AND heim=? AND gast=?;",[$spieltag,$heim,$gast])[0][0];
            $score1=$match["matchResults"][1]["pointsTeam1"];
            $score2=$match["matchResults"][1]["pointsTeam2"];
            mysqli_execute_query($db_id,"INSERT INTO `buli-results` (paarung, score1,score2, spieltag) VALUES (?,?,?,?);",[$paarungsid,$score1,$score2,$spieltag]);
            echo "<script>window.location.reload();</script>"; // Reload Clientseitig anstoßen
        }
    }
} else {
    // Response ist kein JSON
    echo "<script>window.alert(`JSON-Response ungültig (Z.29)! Bitte einen Admin kontaktieren! BuLi-Tipp Daten konnten nicht aktualisiert werden.`);</script>";
}





// Paarungen holen
// HTTP-Request ausführen
$response = file_get_contents("https://api.openligadb.de/getmatchdata/bl".$bundesliga."/".$year."/".getmaxtippspieltag()+1, false);

if ($response === false) {
    echo "<script>window.alert(`Fehler beim HTTP-Request(Z.41)! Bitte einen Admin kontaktieren! BuLi-Tipp Daten konnten nicht aktualisiert werden.`);</script>";
}


$responseData = json_decode($response, true); // Response auswerten
if ($responseData!=null) {
    // Response-Data ist ok
    // Wochentag und Uhrzeit überprüfen, also auch überprüfen, ob die Daten schon aktuell sind
    $aktuell = false;
    foreach ($responseData as $key => $match) {

        // Datum in UTC einlesen
        $date = new DateTime($match["matchDateTimeUTC"], new DateTimeZone('UTC'));

        // In die Zeitzone Berlin konvertieren
        $date->setTimezone(new DateTimeZone('Europe/Berlin'));


        if (!($date->format('l') === 'Saturday' && $date->format('H:i') === '15:30')) {
            // Das Spiel findet nicht Samstags, 15:30 Uhr statt, also sind die Daten aktuell genug.
            $aktuell = true;
        }

    }
    if ($aktuell) {
        // Daten sind aktuell genug, Paarungen in die Datenbank einfügen
        $spieltag=getmaxtippspieltag()+1;
        foreach ($responseData as $key => $match) {

            $deadline = new DateTime($match["matchDateTimeUTC"], new DateTimeZone('UTC'));

            // In die Zeitzone Berlin konvertieren
            $deadline->setTimezone(new DateTimeZone('Europe/Berlin'));

            $heim=$match["team1"]["shortName"];
            $gast=$match["team2"]["shortName"];

            //TODO Jahreswechsel? Spieltag 33 und 34?
            mysqli_execute_query($db_id,"INSERT INTO `buli-paarungen` (`heim`,`gast`,`spieltag`,`deadline`) VALUES (?,?,?,?);",[$heim,$gast,$spieltag,$deadline->format('Y-m-d H:i:s')]);
            echo "<script>window.location.reload();</script>"; // Reload Clientseitig anstoßen
        }
    }
} else {
    // Response ist kein JSON
    echo "<script>window.alert(`JSON-Response ungültig (Z.84)! Bitte einen Admin kontaktieren! BuLi-Tipp Daten konnten nicht aktualisiert werden.`);</script>";
}

