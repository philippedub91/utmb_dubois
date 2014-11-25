<?php
	session_start();

	if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true)
	{
		if(isset($_SESSION['gestionnaire']) && $_SESSION['gestionnaire'] == true)
		{
			echo('Bienvenue Monsieur le Gestionnaire');
		}
		else
		{
			echo('Vous êtes bien connecté : ' .$_SESSION['prenom'].' '.$_SESSION['nom']);	
		}
		
	}
	else
	{
		header('Location: connexion.php');
	}
?>
