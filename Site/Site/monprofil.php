<?php
if(!$_SESSION){
  header("Location: index.php?page=0");
}

$reservations = $unControleur->selectWhereReservation($_SESSION['User']['email'])

?>
<!DOCTYPE html>
<html>
<head>
  <title>Mon Profil</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
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

  </main>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
  <footer>
    <div class="container">
      <p>Copyright © Localuxury</p>
    </div>
  </footer>
</body>
</html>