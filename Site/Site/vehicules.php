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

$sql = "SELECT * FROM Vehicule";
$result = $conn->query($sql);

$query = "SELECT * FROM Vehicule";
$result = mysqli_query($conn, $query);
// while ($row = mysqli_fetch_assoc($result)) {
//     var_dump($row);
// }



?>
<!DOCTYPE html>
<html>

<head>
    <title>Localuxury - Location de voitures de luxe</title>
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
        <h1 class="title">Nos véhicules</h1>
        <div class="container">
            <div class="container-voitures">
    <?php
    $i = 1
    ?>
    <?php
     if ($result->num_rows > 0) : 
        while($row = $result->fetch_assoc()) : ?>
            <div class="card-voiture" id="card-voiture<?php echo $i?>" value="<?php echo $row["idvehicule"]?>">
                <div class="closed">
                    <div class="img">
                        <img class="img-v" src="../Site/Vehicule/<?php echo $row["image"]; ?>" alt="<?php echo $row["marque"] . "" . $row["modele"]; ?>">
                    </div>
                    <div class="nom">
                    <h2><?php echo $row["marque"] . " " . $row["modele"]; ?></h2>
                    </div>
                    <button class="btn-voir-plus" value="<?php echo $i?>">
                        Voir plus
                    </button>
                </div>
                <div class="details" id="details<?php echo $i?>">
                    <p>Année : <?php echo $row["annee"]; ?></p>
                    <p>Caractéristiques : <?php echo utf8_encode($row["caracteristiques"]); ?></p>
                    <p>Prix journalier : <?php echo $row["prix_journalier"]; ?>€</p>
                    <p>Caution : <?php echo $row["caution"]; ?>€</p>
                    <p>Puissance : <?php echo $row["puissance"]; ?> chevaux</p>
                </div>
            </div>

            <?php
            $i++
            ?>
    <?php
endwhile; ?>
    <?php else : ?>
        <p>Aucun véhicule disponible.</p>
    <?php endif; ?>
    </div>

<?php $conn->close(); ?>
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
<script>
    var btnCards = document.querySelectorAll('.btn-voir-plus')
    btnCards.forEach(elem => {
        elem.addEventListener('click', (e) => {
        var id = e.target.value;
        if(e.target.innerText == 'Voir plus'){
        document.getElementById('details' + id).classList.add('open');
        e.target.innerText = 'Voir moins'
        } else {
            document.getElementById('details' + id).classList.remove('open');
            e.target.innerText = 'Voir plus'
        }
    })
    });
</script>
</body>
</html>

