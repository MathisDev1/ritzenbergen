<?php
function getTipp($name, $spieltag, $paarungid)
{
    $userid=srowforeach("SELECT `id` from `buli-user` where username=?;",[$name])[0][0];
    $tippQueryResult = srowforeach("SELECT `tipp1`,`tipp2`,`tipp3`,`tipp4`,`tipp5`,`tipp6`,`tipp7`,`tipp8`,`tipp9` from `buli-tipps` where user=? AND spieltag=?;", [$userid, $spieltag]);
    if (count($tippQueryResult) == 0)
        return null;
    
    $tippids=$tippQueryResult[0];
    $paarungen=srowforeach("SELECT `id` from `buli-paarungen` where `spieltag`=?;",[$spieltag]);
    
    $i=0;
    foreach($tippids as $key => $value){
        if($paarungid==$paarungen[$i][0]){
            // return [0] heim, [1] gast
            return srowforeach("SELECT `score1`,`score2` from `buli-tipp` where `id`=?;",[$value])[0];
        }
        $i++;
    }
}

function ps($name, $spieltag, $paarungid)
{
    $punkte = srowforeach("SELECT score1, score2 from `buli-results` where `paarung`=? AND spieltag=?;", [$paarungid, $spieltag])[0];
    $punktetipp = getTipp($name, $spieltag, $paarungid);

    if ($punktetipp == null){
        return 0;
    }

    if ($punkte == $punktetipp)
        return 3;

    if ($punkte[0] > $punkte[1])
        $differenz = $punkte[0] - $punkte[1];
    else
        $differenz = $punkte[1] - $punkte[0];

    if ($punktetipp[0] > $punktetipp[1])
        $differenztipp = $punktetipp[0] - $punktetipp[1];
    else
        $differenztipp = $punktetipp[1] - $punktetipp[0];

    if ($differenz == $differenztipp)
        return 2;

    if ($punktetipp[0] == $punktetipp[1] || $punkte[0] == $punkte[1]) {
        // Unentschieden
        return 0;
    }

    $siegertipp = $punktetipp[0] > $punktetipp[1]; // true, wenn der Sieger der 1. ist
    $sieger = $punkte[0] > $punkte[1]; // true, wenn der Sieger der 1. ist

    if ($sieger == $siegertipp)
        return 1;
    return 0;
}

function ts($name, $spieltag)
{
    $punkte = 0;
    
    foreach (srowforeach("SELECT `paarung` from `buli-results` where spieltag=?;", [$spieltag]) as $key => $value) {
        $punkte += ps($name, $spieltag, $value[0]);
    }
    return $punkte;
}

function gs($name, $spieltagmax)
{
    $punkte = 0;

    for ($i = 0; $i < $spieltagmax; $i++) {
        $punkte += ts($name, $i+1);
    }

    return $punkte;
}

function getmaxspieltag()
{
    $maxspieltag = 0;
    foreach (srowforeach("SELECT spieltag from `buli-results`;", []) as $key => $value) {
        if ($value[0] > $maxspieltag)
            $maxspieltag = $value[0];
    }
    return $maxspieltag;
}
function getmaxtippspieltag()
{
    $maxspieltag = 0;
    foreach (srowforeach("SELECT spieltag from `buli-paarungen`;", []) as $key => $value) {
        if ($value[0] > $maxspieltag)
            $maxspieltag = $value[0];
    }
    return $maxspieltag;
}


function deadline($spieltag)
{ // Gibt true zurück, wenn die Deadline überschritten ist.
    $deadline = srowforeach("SELECT deadline from `buli-paarungen` where spieltag=?;", [$spieltag])[0][0];
    date_default_timezone_set('Europe/Berlin');

    return strtotime($deadline) < time();
}