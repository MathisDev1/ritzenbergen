<?php
include("buli-check.php");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="./Fotos/ortschild1.gif" type="image/x-icon">
  <meta name="description" content="Internetseite der Dorfgemeinschaft Amedorf und Ritzenbergen">

  <title>Das Bundesliga-Tippspiel</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/parallax/jarallax.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css"> -->
  <link rel="stylesheet" href="modal.css">
  <link rel="manifest" href="./manifest.json">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap" as="style"
    onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap">
  </noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/additional.css">
  <link rel="stylesheet" href="assets/mobirise/css/additional.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/bulitipp.css">
  <link rel="stylesheet" href="./assets/css/bulitipp2.css">


  <style>
    :root {
      --background: #FCFCF8;
      --dominant-color: #DDE5B6;
      --primary-color: #A98467;
      --secondary-color: #6C584C;
      --success-color: #23BA74;
      --danger-color: #BC2130;
      --warning-color: #DDA600;
      --info-color: #0BB0D2;
      --background-text: #000000;
      --dominant-text: #000000;
      --primary-text: #000000;
      --secondary-text: #FFFFFF;
      --success-text: #FFFFFF;
      --danger-text: #FFFFFF;
      --warning-text: #000000;
      --info-text: #FFFFFF;
    }
  </style>
</head>

<body>



  <section class="menu menu2 cid-u6k7q0wPq6" once="menu" id="menu-5-u6k7q0wPq6">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="index.php">
              <img src="./Fotos/ortschild1.gif" style="height: 4.3rem;">
            </a>
          </span>
          <span class="navbar-caption-wrap">
            <a class="navbar-caption text-black display-4" href="http://ritzenbergen.de">Amedorf & Ritzenbergen</a>
          </span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse"
          data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            <li class="nav-item">
              <a class="nav-link link text-black display-4" href="galerie.php">Galerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black display-4" href="#buliresults-section">Ergebnisse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black display-4" href="#buli-table">Punktetabelle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black display-4" href="#rangliste-sektion">Rangliste</a>
            </li>
          </ul>
          <!-- <div class=""> -->
          <div class="navbar-buttons mbr-section-btn">
            <button class="btn btn-primary display-4" id="loginModalOpenBtn" data-id="loginModal">Tippen</button>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </nav>
  </section>

  <div class="modal-container" data-id="loginModalOpenBtn" id="loginModal">
    <div class="modal modalNichtScrollbar">
      <div class="modal-content">
        <span class="closeBtn" style="cursor: pointer;">x</span>
        <section class="buli-container">
          <div>
            <h1>Tippen</h1>
            <p>Bitte logge dich zuerst ein!</p><br>
            <p>Noch kein Konto? <a
                href="mailto:mathis.kmp@gmail.com?subject=Benutzerantrag%20-%20Ritzenberger%20Bundesliga%20Tippspiel&body=**Persönliche%20Informationen:**%0AVorname%2C%20Name:%0AAdresse:%0ATelefonnummer:%0A%0A**Account%20Informationen:**%0AWunsch-Benutzername:%0AWunsch-Passwort:%0A%0A*Diese%20Mail%20wurde%20anhand%20der%20Vorlage%20auf%20ritzenbergen.de/bulitipp.php%20erstellt.*">Sende
                Benutzerantrag</a> </p>

            <form target="tippenIframe" action="tippen.php" id="loginform" method="post" onsubmit="return false;"
              data-id="tippenIframe">

              <p id="spieltagText">Spieltag:</p>
              <input type="number" name="spieltag" max="34" min="1" placeholder="Spieltag"
                value="<?php echo getmaxspieltag() + 1; ?>">
              <input type="text" name="user" maxlength="64" placeholder="Benutzer">
              <input type="password" name="pass" id="password-input" placeholder="Passwort" class="clear">

              <input type="submit" value="=> Tippen! <=">

            </form>
          </div>
          <div id="tippenIframeContainer">
            <iframe id="tippenIframe" name="tippenIframe"></iframe>
            <button id="logoutButton">Abmelden</button>
          </div>
        </section>
      </div>
    </div>
  </div>




  <section class="header16 cid-u6k7q0xIhk mbr-fullscreen mbr-parallax-background" id="hero-17-u6k7q0xIhk">
    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrap col-12 col-md-10">
          <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-4 display-1">
            <strong>Willkommen im Bundesliga Tippspiel</strong>
          </h1>
          <p class="mbr-fonts-style mbr-text mbr-white mb-4 display-7">Saison 2024/2025</p>
          <br><br>
        </div>
      </div>
    </div>
  </section>


  <!--   <h1>Willkommen im Ritzenberger Bundesliga Tippspiel!</h1> -->


  <section class="features023 cid-u6k7q0xclF" id="metrics-1-u6k7q0xclF">
    <div class="container">
      <div class="row content-row justify-content-center">

        <div class="item features-without-image col-12 col-md-6 col-lg-4 item-mb">
          <div class="item-wrapper">

          </div>
        </div>
        <div class="item features-without-image col-12 col-md-6 col-lg-4 item-mb">
          <div class="item-wrapper">
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Paarungsergebnisse -->

  <section class="buli-results" id="buliresults-section">
    <br><br>

    <h2>Paarungsergebnisse</h2>
    <table>
      <tr>
        <td>Paarung</td>
        <td>Ergebnis</td>
      </tr>
      <?php

      $spieltag = getmaxspieltag();
      if (srowforeach("SELECT count(`paarung`) from `buli-results` where spieltag=?;", [$spieltag])[0][0] < 9)
        $spieltag--;
      foreach (srowforeach("SELECT paarung, score1, score2 from `buli-results` where spieltag=?;", [$spieltag]) as $key => $value) {
        $paarung = srowforeach("SELECT heim, gast from `buli-paarungen` where `id`=?;", [$value[0]])[0];
        $score1 = $value[1];
        $score2 = $value[2];
        $paarungid = $value[0];
        $url = "buli-punkte.php?name=null&detail=spiel&spieltag=" . $spieltag . "&paarung=" . $value[0];
        ?>

        <tr>

          <td>
            <div class="modal-container">
              <div class="modal">
                <div class="modal-content">
                  <span class="closeBtn" style="cursor: pointer;">x</span>

                  <?php
                  $detail = "spiel";

                  // include("buli-punkte.php");
                  ?>
                  <iframe src="<?php echo $url; ?>" frameborder="0"></iframe>
                </div>
              </div>
              <span class="openBtn">
                <span class="teams">
                  <span class="team">
                    <img src="./get-buli-image.php?team=<?php echo $paarung[0]; ?>" alt="">
                    <p><?php echo $paarung[0]; ?></p>
                  </span>
                  <span class="vs"></span>
                  <span class="team">
                    <p><?php echo $paarung[1]; ?></p>
                    <img src="./get-buli-image.php?team=<?php echo $paarung[1]; ?>" alt="">
                  </span>
                </span>
              </span>

            </div>
          </td>
          <td>
            <p><?php echo $score1; ?> - <?php echo $score2; ?></p>
          </td>


        </tr>
        <?php
      }
      ?>
    </table>
  </section>


  <!-- Punktetabelle -->
  <section class="buli-table" id="buli-table">
    <br><br>

    <h2>Punktetabelle</h2>
    <table>
      <tr>
        <td>Tag</td>
        <?php
        foreach (srowforeach("SELECT username from `buli-user`;", []) as $key => $value) {
          ?>
          <td><?php echo $value[0]; ?></td>
          <?php
        }
        ?>
      </tr>
      <?php
      for ($i = 0; $i < getmaxspieltag(); $i++) {

        ?>
        <tr>

          <td><?php echo $i + 1; ?></td>

          <?php
          foreach (srowforeach("SELECT username from `buli-user`;", []) as $key => $value) {
            if (srowforeach("SELECT count(`paarung`) from `buli-results` where spieltag=?;", [$i + 1])[0][0] < 9) {
              $punkte = ts($value[0], $i);
            } else {
              $punkte = ts($value[0], $i + 1);
            }
            ?>

            <td><?php echo $punkte; ?></td>

          <?php } ?>
        </tr>
        <?php
      }
      ?>
      <tr>
        <td>Summe</td>
        <?php
        foreach (srowforeach("SELECT username from `buli-user`;", []) as $key => $value) {
          $punkte = gs($value[0], getmaxspieltag());
          ?>
          <td><?php echo $punkte; ?></td>
          <?php
        }
        ?>
      </tr>
    </table>

  </section>


  <!-- Rangliste -->

  <section class="rangliste" id="rangliste-sektion">
    <br><br>

    <h2>Rangliste</h2>
    <table>
      <tr>
        <td>Platz</td>
        <td>Name</td>
        <td>Punkte</td>
      </tr>
      <?php
      $usersWithPoints = [];
      foreach (srowforeach("SELECT username from `buli-user`;", []) as $key => $value) {
        $username = $value[0];
        $punkte = gs($username, getmaxspieltag());
        $usersWithPoints[$username] = $punkte;
      }
      array_multisort($usersWithPoints, SORT_DESC);
      $i = 0;
      foreach ($usersWithPoints as $key => $value) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>
            <div class="modal-container">
              <div class="modal">
                <div class="modal-content">
                  <span class="closeBtn" style="cursor: pointer;">x</span>
                  <iframe class="iframeRanglisteDetailansicht"
                    src="buli-punkte.php?spieltag=<?php echo $spieltag; ?>&paarung=null&detail=user&name=<?php echo $key; ?>"><?php echo $key; ?></iframe>

                </div>
              </div>
              <span class="openBtn"><?php echo $key; ?></span>
            </div>
          </td>
          <td><?php echo $value; ?></td>
        </tr>

        <?php
      }
      ?>
    </table>

  </section>
  <?php /*
<section class="tipperdetails">
<?php
foreach (srowforeach("SELECT username from `buli-user`;", []) as $key => $value) {
$username = $value[0];
?>
<div class="modal-container">
<div class="modal">
<div class="modal-content">
<span class="closeBtn" style="cursor: pointer;">x</span>
<iframe
src="buli-punkte.php?spieltag=<?php echo $spieltag; ?>&paarung=null&detail=user&name=<?php echo $username; ?>"><?php echo $username; ?></iframe>

</div>
</div>
<span class="openBtn"><?php echo $username; ?></span>
</div>

<?php
}

?>
</section>
*/ ?>
  <section class="contacts02 map1 cid-u6k7q0Bejh" id="contacts-2-u6k7q0Bejh">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 content-head">
          <div class="mbr-section-head mb-5">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
              <strong>Kontakte</strong>
            </h3>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="card col-12 col-md-12 col-lg-6">
          <div class="card-wrapper">
            <div class="text-wrapper">
              <ul class="list mbr-fonts-style display-7">
                <li class="mbr-text item-wrap">Name: <a href="tel:123-456-789" class="text-black">Tom Kuhlenkamp</a>
                </li>
                <li class="mbr-text item-wrap">E-Mail: <a href="mailto:tom@ritzenbergen.de"
                    class="text-black">tom@ritzenbergen.de</a></li>
                <li class="mbr-text item-wrap">Adresse: Ritzenberger Weg 18, 27337 Blender</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="map-wrapper col-md-12 col-lg-6">
          <div class="google-map"><iframe frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?key&#x3D;AIzaSyCt1265A4qvZy9HKUeA8J15AOC4SrCyZe4&amp;q&#x3D;Ritzenbergen%2C%20Germany"
              allowfullscreen=""></iframe></div>
        </div>
      </div>
    </div>
  </section>



  <section class="footer3 cid-u6k7q0Blvk" once="footers" id="footer-6-u6k7q0Blvk">
    <div class="container">
      <div class="row">
        <div class="row-links">
          <ul class="header-menu">
            <li class="header-menu-item mbr-fonts-style display-5">
              <button class="text-white btn-ueber">Über</button>
            </li>
            <li class="header-menu-item mbr-fonts-style display-5">
              <button class="text-white btn-kontakt">Kontakt</button>
            </li>

          </ul>
        </div>
        <div class="col-12 mt-4">
          <p class="mbr-fonts-style copyright display-7">
            © 2024 Ritzenbergen. Alle Rechte vorbehalten. <br>
          </p>
        </div>
      </div>
    </div>
  </section>



  <div class="modalUeber">
    <div id="modalUeber" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeUeberModal()">×</span>
        <h1>Über</h1>
        <p>
          Ritzenbergen ist ein kleines Dorf der Gemeinde Blender und liegt dicht an der Weser.
          <br>
          <br>
          Bei dieser Seite handelt es sich um eine Private Homepage der Dorfgemeinschaft Amedorf & Ritzenbergen.
          <br><br>
          © Front-End und Web Design: Mathis Kuhlenkamp <br>
          © Back-End und Datenbanken: Tom Kuhlenkamp, Jonas Kuhlenkamp
          <br>
          <br>
          <a href="./assets/AdminPanel/LoginFormular/loginform.html">Administrations Login</a>
        </p><br><br>

      </div>
    </div>
    <script>
      const modalUeber = document.getElementById("modalUeber");
      const openButtonUeber = document.querySelector(".btn-ueber");
      const closeButtonUeber = document.querySelector(".close-button");

      function openUeberModal() {
        modalUeber.style.display = "block";
      }

      function closeUeberModal() {
        modalUeber.style.display = "none";
      }

      openButtonUeber.addEventListener("click", openUeberModal);

      closeButtonUeber.addEventListener("click", closeUeberModal);

    </script>
  </div>
  <div class="modalKontakt">

    <div id="modalKontaktFormular" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeKontaktFormularModal()">×</span>
        <h1>Kontakt</h1>
        <p>
          Tom Kuhlenkamp <br>
          tom@ritzenbergen.de
        </p><br><br>

      </div>
    </div>

    <script>
      const modalKontaktFormular = document.getElementById("modalKontaktFormular");
      const openButtonKontaktFormular = document.querySelector(".btn-kontakt");
      const closeButtonKontaktFormular = document.querySelector(".close-button");

      function openKontaktFormularModal() {
        modalKontaktFormular.style.display = "block";
      }

      function closeKontaktFormularModal() {
        modalKontaktFormular.style.display = "none";
      }

      openButtonKontaktFormular.addEventListener("click", openKontaktFormularModal);

      closeButtonKontaktFormular.addEventListener("click", closeKontaktFormularModal);
    </script>
  </div>

  <script src="assets/parallax/jarallax.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
  <script src="assets/embla/embla.min.js"></script>
  <script src="assets/embla/script.js"></script>
  <script src="assets/scrollgallery/scroll-gallery.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  <script src="main.js"></script>
  <script>

    (function () {
      var animationInput = document.createElement('input');
      animationInput.setAttribute('name', 'animation');
      animationInput.setAttribute('type', 'hidden');
      document.body.append(animationInput);
    })();

  </script>
  <script src="encodeBuLiLogin.js"></script>
  <script src="./modal.js"></script>

</body>

</html>