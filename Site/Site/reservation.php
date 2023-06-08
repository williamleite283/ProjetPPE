<?php
// Récupération des données du formulaire
if (isset($_POST['reserver'])) {
$vehicule = $_POST['vehicule'];
$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];
$name = $_POST['name'];
$email = $_POST['email'];

// Envoi d'un email de confirmation à l'utilisateur
$to = $email;
$subject = "Confirmation de réservation Localuxury";
$message = "Bonjour " . $name . ",\n\n";
$message .= "Nous avons bien enregistré votre réservation du véhicule " . $vehicule . " pour la période du " . $start_date . " au " . $end_date . ".\n\n";
$message .= "Merci de votre confiance.\n\n";
$message .= "L'équipe Localuxury";
$headers = "From: Localuxury <noreply@localuxury.com>";
mail($to, $subject, $message, $headers);

// Redirection vers une page de confirmation
header("Location: submit-reservation.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Localuxury - Réservation</title>
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
            <h1>Réservez votre véhicule de prestige</h1>
            <form action="submit-reservation.php" method="post">
    <label for="vehicule">Sélectionnez un véhicule:</label>
    <select id="vehicule" name="vehicule">
        <option value=""></option>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "localuxury1";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT idvehicule, marque, modele from Vehicule";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["idvehicule"]. "'> " . $row["marque"]. " " . $row["modele"]."</option>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </select>
    <label for="start-date">Date de départ:</label>
    <input type="date" id="start-date" name="start-date" required>
    <label for="end-date">Date de retour:</label>
    <input type="date" id="end-date" name="end-date" required>
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <input type="submit" value="Réserver" name="reserver">
</form>


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







