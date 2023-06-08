<?php
if($_SESSION){
  header("Location: index.php?page=0");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="login.css">
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
        <h1>Connexion</h1>
        <?php
          if(isset($_POST['login'])) {
            // Check if both username and password fields have been filled in
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
              // Check if the username and password match the stored credentials
              $unUser = $unControleur->verifConnexion($_POST['email'], $_POST['password']); 
              if($unUser){
                $_SESSION['User'] = $unUser;
                header("Location: index.php?page=0");
              } else {
                // Incorrect username or password, display error message
                echo '<p class="error-message">Nom d\'utilisateur ou mot de passe incorrect</p>';
              }
            } else {
              // Fields were not filled in, display error message
              echo '<p class="error-message">Veuillez remplir tous les champs</p>';
            }
          }
        ?>
        <form action="" method="post">
          <label for="username">Email :</label>
          <input type="text" id="email" name="email" required>
          <br>
          <label for="password">Mot de passe :</label>
          <input type="password" id="password" name="password" required>
          <br>
          <input type="submit" name="login" value="Se connecter">
        </form>
      </div>
    </main>

    <footer>
      <div class="container">
        <p>&copy; Localuxury</p>
      </div>
    </footer>
  </body>
</html>