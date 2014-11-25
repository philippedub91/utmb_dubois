<?php
	session_start();

	//Vérifie s'il y a des erreurs
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = 'Tous les champs requis ne sont pas remplis';
			break;
			case 2:
				$message = 'Certains champs ne sont pas remplis correctement';
			break;
			case 3:
				$message = 'Problème lors de l\'envoi de la requête';
			break;
			default:
			break;
		}

		//Applique un style au message
		$message = '<span id="msg_err">'.$message.'</span>';
	}

	//Vérifie si le formulaire a fonctionné
	if(isset($_GET['add']))
	{
		switch($_GET['add'])
		{
			case 1:
				$message = '<span id="msg_add">Le centre "'.$_GET['lib'].'" a été ajouté</span>';
			break;
			default:
			break;
		}

		//Applique un style au message
		$message = '<span class="msg_add">'.$message.'</span>';
	}

	//Insertion des données
	//Vérifie que tous les champs requis sont remplis
	if(isset($_POST['txt_TypePoste']) && isset($_POST['txt_revenuTypePoste']))
	{
		if(!empty($_POST['txt_TypePoste']) && !empty($_POST['txt_revenuTypePoste']))
		{
			//Connexion à la base, préparation et envoie de la requete
			$con = mysqli_connect('localhost', 'utmb', 'tvn595', 'utmb');
			$sql = 'INSERT INTO TYPEPOSTE (libelleTypePoste, interetPoste) VALUES (?,?)';
			$requete = mysqli_prepare($con, $sql);
			$ok = mysqli_stmt_bind_param($requete, 'ss', $libelle, $interet);
			$libelle = $_POST['txt_TypePoste'];
			$interet = $_POST['txt_revenuTypePoste'];
			$ok = mysqli_execute($requete);
			if($ok == false)
			{
				header('Location:	ajouterTypePoste.php?err=3');
			}
			else
			{
				header('Location: ajouterTypePoste.php?add=1&lib='.$_POST['txt_TypePoste']);
			}

		}
		else
		{
			header('Location: ajouterTypePoste.php?err=1');
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Ajouter un type de poste</title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="css/general.css" type="text/css">
		<link rel="stylesheet" href="css/objets.css" type="text/css">
	</head>

	<body>
		<header>
			<a href="index.php"><img src="img/logo.jpg" height="150" alt="The North Face Ultra-Trail Mont Blanc"></a>
		</header>

		<nav>
			<?php //include('menu.php'); ?>
		</nav>

		<section class="centre">
			<h3 style="text-align:center;">Ajouter un type de poste</h3>
			<?php

				//Affiche un message si $message existe.
				if(isset($message))
				{
					echo($message);
				}
			?>

			<hr>

			<form method="POST" action="ajouterTypePoste.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_TypePoste">Libellé :</label></td>
						<td><input type="text" name="txt_TypePoste" id="form_txt"></td>
					</tr>
					<tr>
						<td><label for="txt_revenuTypePoste">Interêt :</label></td>
						<td>
							<textarea name="txt_revenuTypePoste" id="form_txt" rows="10" cols="22"></textarea>
						</td>
					</tr>

					<tr>
						<td><!--vide--></td>
						<td><input type="SUBMIT" name="btn_ok" id="form_btn" value="Valider"></td></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>