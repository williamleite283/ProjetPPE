<?php
// Vérification que les champs obligatoires sont remplis
if (empty($_POST['vehicule']) || empty($_POST['start-date']) || empty($_POST['end-date']) || empty($_POST['name']) || empty($_POST['email'])) {
    header("Location: reservation.php?error=missing_fields");
    exit();
}

// Récupération des données du formulaire
$vehicule_id = $_POST['vehicule'];
$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];
$name = $_POST['name'];
$email = $_POST['email'];

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "localuxury1";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion à la base de données
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification que le véhicule sélectionné est disponible pour la période demandée
$sql = "SELECT * FROM reservation WHERE vehicule_id='$vehicule_id' AND ((start_date <= '$start_date' AND end_date >= '$start_date') OR (start_date <= '$end_date' AND end_date >= '$end_date'))";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $conn->close();
    header("Location: reservation.php?error=unavailable_vehicle");
    exit();
}

// Ajout de la réservation à la base de données
$sql = "INSERT INTO reservation (vehicule_id, vehicule_marque, vehicule_modele, start_date, end_date, name, email) VALUES ('$vehicule_id', (select marque from vehicule where idvehicule = '$vehicule_id'), (select modele from vehicule where idvehicule = '$vehicule_id'), '$start_date', '$end_date', '$name', '$email')";
if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: index.php?page=3");
    exit();
} else {
    $conn->close();
    header("Location: reservation.php?error=database_error");
    exit();
}
?>
