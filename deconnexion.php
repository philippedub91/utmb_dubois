<?php
	session_start();

	//Vérifie si l'utilisateur est connecté
	if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
	{
		//Détruit la session en cours.
		session_destroy();
	}

	//Redirige vers le formulaire de connexion
	header('Location: connexion.php');
?>