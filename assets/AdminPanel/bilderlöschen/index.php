<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bildgalerie Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Bildgalerie Admin Dashboard</h1><span><button id="save-button">Speichern</button></span>

    <table>

        <?php

        $imagepath = "../../../" . "bilder/erntefest";
        $whitelistpath = "../../../" . "bilder/erntefest/whitelist.txt";
        $whitelist = explode("\r\n", file_get_contents($whitelistpath));
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
          global $images;
          if($i%6==0){
            echo "<tr>";
          }
          echo "<td><img onclick=\"convertImageToBlackAndWhite(this)\" src=\"bildbeschriften.php?image=".$images[$i]."&text=0000\"></td>";
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

  <script src="script.js"></script>
</body>

</html>