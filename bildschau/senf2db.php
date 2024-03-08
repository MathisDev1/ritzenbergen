<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    error_reporting(-1);
    $titel_short="senf2db";
    $titel=$titel_short;
    include("../mysqlverbinden.php");
    mysqli_select_db($db_id,"DB1");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titel_short; ?></title>
</head>
<body>
    <?php
    $bilderpath="bilder/";
    $bilderarr=scandir($bilderpath);
    foreach ($bilderarr as $key => $value) {
        if(($value=="." || $value==".." || $value=="@eaDir") || pathinfo($value)["extension"]!="txt"){
            continue;
        }
        echo "<p>Übertrage ";
        echo $value." Path: ";
        $senfpath=$bilderpath.$value;
        echo $senfpath;
        echo "</p>";
        $file=fopen($senfpath,"r");

        $filecontent=fread($file,999999);
        fclose($file);
        $filecontentarr=explode("\n",$filecontent,999999);
        foreach ($filecontentarr as $key => $value) {
            $autor=explode(":", $value)[0];
            $kommentar=explode(":",$value)[1];
            echo $autor." : \"".$kommentar."\"<br>";
            $bildpath=str_replace("senf","pic",$senfpath);
            $bildpath=str_replace("txt","jpg",$bildpath);
            echo $bildpath."<br>";
            mysqli_query($db_id,"INSERT INTO `fotoscomments` (`id`, `schreiber`, `kommentar`, `bildpfad`, `lastUpdate`) VALUES (NULL, '$autor', '$kommentar', '$bildpath', NULL);");
        }
    }
    ?>
</body>
</html>