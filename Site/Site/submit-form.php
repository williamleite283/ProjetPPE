<!DOCTYPE html>
<html>
<head>
	<title>Contactez-nous</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<header>
		<div class="container">
			<a href="#">
				<img src="logo.png" alt="Logo">
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
			<h1>Contactez-nous</h1>
			<form method="post" action="envoyer-message.php">
				<label for="nom">Nom :</label>
				<input type="text" name="nom" id="nom" required>
				<label for="email">E-mail :</label>
				<input type="email" name="email" id="email" required>
				<label for="sujet">Sujet :</label>
				<input type="text" name="sujet" id="sujet" required>
				<label for="message">Message :</label>
				<textarea name="message" id="message" required></textarea>
				<input type="submit" value="Envoyer">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			<p>Contactez-nous :</p>
			<p>Téléphone : 01 23 45 67 89</p>
			<p>E-mail : daniel.rzekec@hotmail.com</p>
			<div class="reseaux-sociaux">
				<a href="#"><img src="facebook.png" alt="Facebook"></a>
				<a href="#"><img src="twitter.png" alt="Twitter"></a>
				<a href="#"><img src="instagram.png" alt="Instagram"></a>
			</div>
		</div>
	</footer>
</body>
</html>

<?php
if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$sujet = $_POST['sujet'];
	$message = $_POST['message'];

	$destinataire = 'votre-adresse-email@domaine.com';
	$entete = 'From: ' . $nom . ' <' . $email . '>' . "\r\n" .
		'Reply-To: ' . $email . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($destinataire, $sujet, $message, $entete)) {
		header('Location: submit-reservation.php');
		exit();
	} else
		echo "Une erreur est survenue lors de l\'envoi du message"
}