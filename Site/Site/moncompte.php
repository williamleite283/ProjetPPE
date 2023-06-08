<?php
if(!$_SESSION){
  header("Location: index.php?page=0");
}

$reservations = $unControleur->selectWhereReservation($_SESSION['User']['email'])


?>

<!DOCTYPE html>
<html>
<head>
  <title>Mon compte</title>
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
    <div class="container">
      <h1>Mon compte</h1>
      <p>Bienvenue <?php echo $_SESSION["User"]['prenom'] . " ". $_SESSION["User"]['nom']; ?> !</p>
      <a href="logout.php">Déconnexion</a>
    </div>
    <div class="container-reservations">
      <table class="table-reservations">
        <th>Nom du véhicule</th>
        <th>Date de début</th>
        <th>Date de fin</th>
<?php
foreach($reservations as $res){
  echo "<tr>
  <td>" . $res['vehicule_marque'] . " " .$res['vehicule_modele'] . "</td>
  <td>" . $res['start_date'] . "</td>
  <td>" . $res['end_date'] . "</td>
  </tr>";
}
if(empty($reservations)){
  echo "<tr>
  <td colspan='3'> Vous n'avez aucune réservation </td>
  </tr>";
}
?>
</table>
    </div>
  </main>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
  <footer>
    <div class="container">
      <p>Copyright © Localuxury</p>
    </div>
  </footer>
</body>
</html>