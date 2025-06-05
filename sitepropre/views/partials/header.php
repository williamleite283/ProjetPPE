<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Localuxury - Location de voitures de luxe</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
</head>

<body>
    <header>
        <div class="container">
            <a href="index.php?page=home">
                <img src="assets/img/logo.png" alt="Localuxury" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="index.php?page=home">Accueil</a></li>
                    <li><a href="index.php?page=vehicles">Nos véhicules</a></li>
                    <li><a href="index.php?page=reservation">Réservation</a></li>
                    <?php
                    if (isset($_SESSION['User'])) {
                        echo '<li><a href="index.php?page=account">Mon Compte</a></li>';
                        echo '<li><a href="index.php?page=logout">Déconnexion</a></li>';
                    } else {
                        echo '<li><a href="index.php?page=login">Connexion</a></li>';
                    }
                    ?>
                    <li><a href="index.php?page=contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>