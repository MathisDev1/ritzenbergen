<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Besucherzähler</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
        $file=fopen("../../../hits.txt","r");
        $hits=fread($file,9999999);
        fclose($file);
    
    ?>
<div class="counter-container">
    <h1 class="counter-heading">Besucherzähler</h1>

    <p class="total-visitors" id="totalVisitors"><?php echo $hits; ?></p>

    <h2>Besucher der letzten 24 Stunden</h2>

    <table id="recentVisitorsTable" class="recent-visitors-table">
        <thead>
            <tr>
                <th>Uhrzeit</th>
                <th>IP-Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach (srowforeach("SELECT `ip`,`timestamp` from `ritzenbergen-hits` where `timestamp` > NOW() - INTERVAL 1 DAY",[]) as $key => $value) {
                    $ip=$value[0];
                    $timestamp=$value[1];
                    echo "<tr><td>$timestamp</td><td>$ip</td></tr>";
                }
                
            ?>
        </tbody>
    </table>
</div>

<style>
    body {
    font-family: sans-serif;
}

.counter-container {
    width: 500px;
    margin: 0 auto;
    text-align: center;
}

.counter-heading {
    font-size: 24px;
    margin-bottom: 10px;
}

.total-visitors {
    font-size: 36px;
    font-weight: bold;
}

.recent-visitors-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.recent-visitors-table th, .recent-visitors-table td {
    border: 1px solid #ccc;
    padding: 5px;
    text-align: left;
}

.recent-visitors-table th {
    background-color: #f2f2f2;
}

</style>

<script src="script.js"></script>
</body>
</html>
<?php
}
include ("../footer.php");
?>