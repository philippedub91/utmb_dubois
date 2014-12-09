<?php
	session_start();

	//Connexion à la base de données
	require('connexion_bdd.php');

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
				$message = 'Problème lors de l\'envoi de la requête'.$_GET['q'];
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
				$message = '<span id="msg_add">Association</span>';
			break;
			default:
			break;
		}

		//Applique un style au message
		$message = '<span class="msg_add">'.$message.'</span>';
	}

	//Traitement des informations
	if(isset($_POST['lst_poste']) && isset($_POST['lst_comp']))
	{
		if(!empty($_POST['lst_poste']) && !empty($_POST['lst_comp']))
		{
			$sql = 'INSERT INTO NECESSITE (idTypePoste, idCompetence) VALUES (?, ?)';
			$requete = mysqli_prepare($con, $sql);
			$ok = mysqli_stmt_bind_param($requete, 'is', $idTypePoste, $idCompetence);
			$idTypePoste = $_POST['lst_poste'];
			$idCompetence = $_POST['lst_comp'];
			$ok = mysqli_execute($requete);
			if($ok == false)
			{
				header('Location: associerCompetences.php?err=3&q='.$sql);
			}
			else
			{
				header('Location: associerCompetences.php?add=1');
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Associer des compétences</title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="css/general.css" type="text/css">
		<link rel="stylesheet" href="css/objets.css" type="text/css">
	</head>

	<body>
		<header>
			<a href="index.php"><img src="img/logo.jpg" height="150" alt="The North Face Ultra-Trail Mont Blanc"></a>
		</header>

		<nav>
			<a href="index.php">< Retourner au menu</a>
		</nav>

		<section class="centre">
			<h3 style="text-align:center;">Associer des compétences</h3>
			<?php

				//Affiche un message si $message existe.
				if(isset($message))
				{
					echo($message);
				}
			?>

			<hr>

			<form method="POST" action="associerCompetences.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="lst_poste">Choisir un poste :</label></td>
						<td>
							<select name="lst_poste">
							<?php
								$resultat = mysqli_query($con, 'SELECT idTypePoste, libelleTypePoste FROM TYPEPOSTE');
								if($resultat == false)
								{
									echo('Echec execution requete');
								}
								else
								{
									while($ligne = mysqli_fetch_assoc($resultat))
									{
										echo('<option value="'.$ligne['idTypePoste'].'">'.$ligne['libelleTypePoste'].'</option>');
									}
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="lst_comp">Choisir une compétence :</label></td>
						<td>
							<select name="lst_comp">
							<?php
								$resultat = mysqli_query($con, 'SELECT idCompetence, libelleCompetence FROM COMPETENCE');
								if($resultat == false)
								{
									echo('Echec execution requete');
								}
								else
								{
									while($ligne = mysqli_fetch_assoc($resultat))
									{
										echo('<option value="'.$ligne['idCompetence'].'">'.$ligne['libelleCompetence'].'</option>');
									}
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="submit" name="btn_ok" id="form_btn" value="Valider"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><a href="index.php">[Revenir au menu]</a></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>