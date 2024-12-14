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
  <title>Bildgalerie Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>Bildgalerie Admin Dashboard</h1><span><button id="save-button">Speichern</button></span>

    <table>

        <?php

        function lineEnding($str) {
          if (strpos($str, "\r\n") !== false) return "\r\n";
          if (strpos($str, "\n") !== false) return "\n";
          return null;
        }
        if(!isset($_POST["images"])) die("POST images fehlt");
        $imagepath = $_POST["images"];
        $whitelistpath = $imagepath."/whitelist.txt";
        if(empty(file_get_contents($whitelistpath))) $whitelist=[];
        else $whitelist = explode(lineEnding(file_get_contents($whitelistpath)), file_get_contents($whitelistpath));
        $images = [];
        function recursiveDir($dir, &$results = array())
        {
          $files = scandir($dir);

          foreach ($files as $key => $value) {
            $path = $dir . DIRECTORY_SEPARATOR . $value;
            if (!is_dir($path)) {
              if(pathinfo($path)["extension"]=="jpg") $results[] = $path;
            } else if ($value != "." && $value != "..") {
              recursiveDir($path, $results);
              // $results[] = $path;
            }
          }

          return $results;
        }
        $images = recursiveDir($imagepath);
        function showImage($i)
        {
          global $images,$whitelist;
          if($i%6==0){
            echo "<tr>";
          }
          $grayscale=!in_array(substr($images[$i],9),$whitelist);
          echo "<td><img onclick=\"convertImageToBlackAndWhite(this)\" ".(($grayscale)?"class=\"grayscale\" ":"")."src=\"bildbeschriften.php?image=".$images[$i]."&text=0000&username=".$_POST["username"]."&password=".$_POST["password"]."\"></td>";
          if($i%6==5){
            echo "</tr>";
          }
        }
        foreach ($images as $key => $value) {
          showImage($key);
        }

        ?>
        
    </table>
  </div>
  <script>
  var whitelistpath="<?php echo $whitelistpath; ?>";
        var username=`<?php echo $_POST["username"]; ?>`;
        var password=`<?php echo $_POST["password"]; ?>`;
</script>
  <script src="script.js"></script>
</body>

</html>

<?php
}
include ("../footer.php");
?>