<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="./Fotos/ortschild1.gif" type="image/x-icon">
  <meta name="description" content="Ritzenbergen, ein charmantes Dorf mit einer reichen Geschichte und einer lebendigen Gemeinschaft.">

  <title>Willkommen auf ritzenbergen.de</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/parallax/jarallax.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/additional.css"><link rel="stylesheet" href="assets/mobirise/css/additional.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/index.css">
  
  

  <style>:root{ --background: #FCFCF8; --dominant-color: #DDE5B6; --primary-color: #A98467; --secondary-color: #6C584C; --success-color: #23BA74; --danger-color: #BC2130; --warning-color: #DDA600; --info-color: #0BB0D2; --background-text: #000000; --dominant-text: #000000; --primary-text: #000000; --secondary-text: #FFFFFF; --success-text: #FFFFFF; --danger-text: #FFFFFF; --warning-text: #000000; --info-text: #FFFFFF;}</style>
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
      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-bs-toggle="collapse" data-target="#navbarSupportedContent"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarNavAltMarkup" aria-expanded="false"
        aria-label="Toggle navigation">
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
            <a class="nav-link link text-black display-4" href="index.html#news-1-u6k7q0xyDG">Termine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link text-black display-4" href="galerie.php"
              aria-expanded="false">Galerie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link text-black display-4" href="index.html#call-to-action-9-u6k7q0zosO">Umgebung</a>
          </li>

          <li class="nav-item">
            <a class="nav-link link text-black display-4" href="index.html#contacts-2-u6k7q0Bejh">Kontakt</a>
          </li>
        </ul>
        <div class="navbar-buttons mbr-section-btn">
          <a class="btn btn-primary display-4" href="index.html#about-us-12-u6k7q0yKNv">Über Ritzenbergen</a>
        </div>
      </div>
    </div>
  </nav>
</section>




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


<section>
    <div class="galerie-container">
        <b><h2><?php echo explode("\r\n",file_get_contents("bilder/".$_GET["ev"]."/info.txt"))[1]; ?></h2><p>Vorschaubilder</p></b>
        <?php echo count(glob("bilder/".$_GET["ev"]."/*.jpg")); ?> Bilder
        <table>
          
            <?php 
              for ($i=0; $i < count(glob("bilder/".$_GET["ev"]."/*.jpg"));) { 
                echo "<tr>";
                for($j=0;$j<5&&$i<count(glob("bilder/".$_GET["ev"]."/*.jpg"));$i++){
                  echo "<td><a href=\"bildschau.php?path=".$_GET["ev"]."&&bild=".$i."\"><img src=\"".glob("bilder/".$_GET["ev"]."/*.jpg")[$i]."\" alt=\"Vorschaubild\"></td></a>"; 
                  $j++;
                }
                echo "</tr>";
              }
            ?>

          </table>
      </div>


    <style>
        .galerie-container {
            width: 80%; /* Breite der Galerie anpassen */
            margin: 0 auto; /* Galerie in der Mitte ausrichten */
        }

        table {
        width: 100%; /* Tabelle über die gesamte Breite des Containers */
        border-collapse: collapse; /* Zellränder entfernen */
        }

        th, td {
        padding: 20px; /* Abstand zwischen Bild und Rand der Zelle */
        text-align: center; /* Text in der Mitte ausrichten */
        }

        img {
        width: 70%; /* Breite der Vorschaufotos */
        height: auto; /* Automatisches Seitenverhältnis bewahren */
        margin: 0 auto; /* Bild in der Mitte der Zelle ausrichten */
        border-radius: 15px;
        }

        @media (max-width: 768px) { 
  /* Smartphones (ca. Portrait-Modus) */
        table {
          width: 100%; /* Galerie über die gesamte Breite */
        }

        tr {
          display: flex; /* Bilder in einer Reihe anordnen */
          flex-wrap: wrap; /* Zeilenumbruch aktivieren */
        }

        td {
          flex: 1 0 50%; /* Zellenbreite gleichmäßig aufteilen */
          padding: 10px; /* Randabstand verringern */
        }

        img {
          width: 100%; /* Bilder über die gesamte Zellenbreite */
          height: auto; /* Seitenverhältnis bewahren */
          margin: 0; /* Bildränder entfernen */
        }
      }

    @media (min-width: 769px) and (max-width: 1024px) {
      /* Tablets (ca. Portrait-Modus) */
      table {
        width: 80%; /* Galerie etwas schmaler */
      }

      tr {
        display: flex; /* Bilder in 3 Reihen anordnen */
        flex-wrap: wrap;
      }

      td {
        flex: 1 0 33%; /* Zellenbreite gleichmäßig aufteilen */
        padding: 15px; /* Randabstand etwas erhöhen */
      }

      img {
        width: 100%; /* Bilder über die gesamte Zellenbreite */
        height: auto; /* Seitenverhältnis bewahren */
        margin: 0; /* Bildränder entfernen */
      }
  }

        
    </style>
</section>




<style>
  .modal {
    margin: auto;
    justify-content: center;
    text-align: center;
    width: 100ch;
    height: 600px;
    top: 0;
    /* Positioniert das Modal oben im Viewport */
    left: 0;
    /* Positioniert das Modal links im Viewport */
    right: 0;
    /* Erweitert das Modal auf die gesamte Breite */
    bottom: 0;
    /* Erweitert das Modal auf die gesamte Höhe */
    z-index: 3000;
    /* Bringt das Modal in den Vordergrund */
  }

  .modal-content {
    background-color: #ffffff;
    /* Hintergrundfarbe des Inhalts */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    /* Schatten */
    border: none;
    /* Entferne den Rahmen */
    margin: 15% auto;
    height: auto;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
  }

  .close {
    color: #4CAF50;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }


  @media (max-width: 768px) {

    /* Anpassungen für Smartphones */
    .modal {
      max-width: 100vw;
    }

    .modal-content {
      max-width: 100vw;
      /* 100% Breite auf Smartphones */
      text-align: left;
    }
  }
</style>





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

    (function(){
      var animationInput = document.createElement('input');
      animationInput.setAttribute('name', 'animation');
      animationInput.setAttribute('type', 'hidden');
      document.body.append(animationInput);
    })();

  </script>
</body>
</html>



























    
