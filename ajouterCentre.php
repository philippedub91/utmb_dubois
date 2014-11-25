<?php
	session_start();

	//Vérifie s'il y a des erreurs
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = 'Tous les champs ne sont pas remplis';
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
				$message = '<span id="msg_add">Le centre '.$_GET['lib'].' a été ajouté</span>';
			break;
			default:
			break;
		}

		//Applique un style au message
		$message = '<span class="msg_add">'.$message.'</span>';
	}

	//Vérifie si tous les champs sont remplis et respectent les règles (uniquement carac num pour les postes).
	if(isset($_POST['txt_libelle']) && isset($_POST['lst_plageHoraireCentre'])) 
	{
		if(isset($_POST['txt_poste1']) && isset($_POST['txt_poste2']) && isset($_POST['txt_poste3']) && isset($_POST['txt_poste4']))
		{
			if(!empty($_POST['txt_libelle']) && !empty($_POST['lst_plageHoraireCentre']))
			{
				if(!empty($_POST['txt_poste1']) && !empty($_POST['txt_poste2']) && !empty($_POST['txt_poste3']) && !empty($_POST['txt_poste4']))
				{
					if(is_numeric($_POST['txt_poste1']) && is_numeric($_POST['txt_poste2']) && is_numeric($_POST['txt_poste3']) && is_numeric($_POST['txt_poste4']))
					{
						//Connexion à la base, préparation et envoie de la requete
						$con = mysqli_connect('localhost', 'utmb', 'tvn595', 'utmb');
						$sql_centre = 'INSERT INTO CENTRE (libelleCentre, plageHoraireCentre) VALUES(?,?)';
						$requete = mysqli_prepare($con, $sql_centre);
						$ok = mysqli_stmt_bind_param($requete, 'ss', $libelle, $plage);
						$libelle = $_POST['txt_libelle'];
						$plage = $_POST['lst_plageHoraireCentre'];
						$ok = mysqli_execute($requete);
						if($ok == false)
						{
							header('Location: ajouterCentre.php?err=3');
						}
						else
						{
							header('Location: ajouterCentre.php?add=1&lib='.$_POST['txt_libelle']);
						}
						mysqli_stmt_close($requete);
					}
					else
					{
						header('Location: ajouterCentre.php?err=2');
					}
				}
				else
				{
					header('Location: ajouterCentre.php?err=1');
				}
			}
		}
		else
		{
			header('Location: ajouterCentre.php?err=1');
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Ajouter un centre</title>
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
			<h3 style="text-align:center;">Ajouter un centre</h3>
			<?php

				//Affiche un message si $message existe.
				if(isset($message))
				{
					echo($message);
				}
			?>

			<hr>

			<form method="POST" action="ajouterCentre.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_libelle">Libellé :</label></td>
						<td><input type="text" name="txt_libelle" id="form_txt"></td>
					</tr>
					<tr>
						<td><label for="lst_plageHoraireCentre">Plage horaire :</label></td>
						<td>
							<select name="lst_plageHoraireCentre">
								<option value="du vendredi matin au samedi vers minuit">Du vendredi matin au samedi vers minuit</option>
								<option value="vendredi après-midi et soirée">Vendredi après-midi et soirée</option>
								<option value="du vendredi à 16h au samedi matin">Du vendredi à 16h au samedi matin</option>
								<option value="du vendredi après-midi jusqu'au dimanche à l'aube">Du vendredi après-midi jusqu'au dimanche à l'aubre</option>
								<option value="du vendredi après-midi jusqu'au dimanche matin">Du vendredi après-midi jusqu'au dimanche matin</option>
								<option value="du vendredi après-midi au dimanche après-midi">Du vendredi après-midi au dimanche après-midi</option>
								<option value="du vendredi fin d'après-midi au dimanche midi">Du vendredi fin d'après-midi jusqu'au dimanche midi</option>
								<option value="du vendredi soir au dimanche en début d'après-midi">Du vendredi soir au dimanche en début d'après-midi</option>
							</select>
						</td>
					</tr>
					<tr>
					<tr>
						<td><!--vide--></td>
						<td>Nb bénévoles</td>
					</tr>
					<tr>
						<td><label for="txt_poste1">Equipe Technique :</label></td>
						<td><input type="text" name="txt_poste1" id="form_txt" size="3"></td>
					</tr>
					<tr>
						<td><label for="txt_poste2">Secours :</label></td>
						<td><input type="text" name="txt_poste2" id="form_txt" size="3"></td>
					</tr>
					<tr>
						<td><label for="txt_poste3">Contrôle informatique :</label></td>
						<td><input type="txt" name="txt_poste3" id="form_txt" size="3"></td>
					</tr>
					<tr>
						<td><label for="txt_poste4">Ravitaillement :</label></td>
						<td><input type="txt" name="txt_poste4" id="form_txt" size="3"></td>
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