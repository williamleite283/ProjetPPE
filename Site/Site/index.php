<?php
	session_start(); 
	require_once("../controleur/config_bdd.php"); 
	require_once("../controleur/controleur.class.php"); 
	//intancier ma classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
</head>
<body>
<center>
	<?php
		if(isset($_POST['seConnecter']))
		{
			$email = $_POST['email']; 
			$mdp = $_POST['mdp']; 
			$unUser = $unControleur->verifConnexion ($email, $mdp); 
			if ($unUser == null){
				echo "<br/> Vérifiez vos identifiants"; 
			}else {
				$_SESSION['email'] = $unUser['email']; 
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];

				header("Location: index.php?page=0"); 
			}
		}
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else {
			$page = 0 ;
		}
		switch ($page){
			case 0 : require_once("accueil.php"); break;
			case 1 : require_once("vehicules.php"); break;
			case 2 : require_once("reservation.php"); break;
			case 3 : require_once("moncompte.php"); break;
			case 4 : require_once("contact.php"); break;
			case 5 : require_once("login.php"); break; 
			case 6 : require_once("monprofil.php"); break; 
					// session_destroy(); 
					// unset($_SESSION['email']);
					// header("Location: index.php?page=0");
					// break;
			default : require_once("erreur_404.php"); break;
		}
?>
</center>
</body>
</html>















