<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de réservation</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
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
        <div class="container">
            <h1>Votre réservation a été confirmée!</h1>
            <p>Merci d'avoir réservé votre véhicule avec Localuxury. Nous avons bien reçu votre demande de réservation et nous vous contacterons bientôt pour confirmer les détails de votre réservation.</p>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>© Localuxury</p>
            <div class="social-media">
                <a href="#"><img src="facebook.png" alt="Facebook"></a>
                <a href="#"><img src="instagram.png" alt="Instagram"></a>
                <a href="#"><img src="twitter.png" alt="Twitter"></a>
            </div>
        </div>
    </footer>
</body>
</html>
