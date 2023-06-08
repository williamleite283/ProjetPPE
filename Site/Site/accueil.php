<!DOCTYPE html>
<html>
<head>
  <title>Localuxury - Location de voitures de luxe</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
  <style>
    /* body{
      background-image: url('voiture.gif');
      background-repeat: no-repeat;
      background-size: cover;
    } */


    
main {
  background-image: url('voiture.gif');
      background-size: 75%;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: bottom;
  min-height: 71.5vh;
}
  </style>
</head>
<body>
<header>
    <div class="container">
      <a href="#">
        <img src="logo.png" alt="Localuxury" class="logo">
      </a>
      <nav>
        <ul>
          <li><a href="index.php?page=0">Accueil</a></li>
          <li><a href="index.php?page=1">Nos véhicules</a></li>
          <li><a href="index.php?page=2">Réservation</a></li>
          <?php if(!empty($_SESSION)){
          echo '<li><a href="index.php?page=3">Mon compte</a></li>';
          echo '<li><a href="index.php?page=6">Mon Profil</a></li>';
          }
          ?>
          <li><a href="index.php?page=4">Contact</a></li>
          <?php if(empty($_SESSION)){
          echo '<li><a href="index.php?page=5">Connexion</a></li>';
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="container container-accueil">
      <h1>Location de voitures de luxe</h1>
      <p>Chez Localuxury, nous vous offrons une sélection exclusive de véhicules de prestige pour vous permettre de vivre des expériences uniques.</p>
      <a href="vehicules.php" class="cta">Voir nos véhicules</a>

    </div>
  </main> 
  <footer>
    <div class="container">
      <p>Copyright © Localuxury</p>
      <div class="social-media">
        <a href="#"><img src="facebook.png" alt="Facebook"></a>
        <a href="#"><img src="instagram.png" alt="Instagram"></a>
        <a href="#"><img src="twitter.png" alt="Twitter"></a>
      </div>
    </div>
  </footer>
</body>
</html>






