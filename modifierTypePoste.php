<?php
	session_start();

	//Connexion à la base de données
	require('connexion_bdd.php');


	if(!isset($_SESSION['gestionnaire']))
	{
		if(isset($_SESSION['idBenevole']))
		{
			header('Location: index.php');
		}
		else
		{
			header('Location: index.php');
		}
	}

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


	//Traitements futurs
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
			<a href="index.php">< Retourner au menu</a>
		</nav>

		<section class="centre">
			<h3 style="text-align:center;">Modifier un type de poste</h3>
			<?php

				//Affiche un message si $message existe.
				if(isset($message))
				{
					echo($message);
				}
			?>

			<hr>

			<table>
				<form method="POST" action="modifierTypePoste.php">
					<tr>
						<td><label for="txt_codeTypePoste">Code :</label></td>
						<td><input type="text" name="txt_codeTypePoste" id="form_txt"></td>
						<td><input type="submit" name="btn_afficher" id="form_btn"></td>
					</tr>
				</form>
			</table>

			<?php
				if(isset($_POST['txt_codeTypePoste']))
				{
					if(!empty($_POST['txt_codeTypePoste']))
					{
						//Requete qui permettra d'afficher les informations d'un type de poste
						$sql_typePoste = 'SELECT libelleTypePoste, interetTypePoste FROM TYPEPOSTE WHERE idTypePoste = ?';
						$result_typePoste = mysqli_prepare($con, $sql_typePoste);
						$ok_typePoste = mysqli_stmt_bind_param($result_typePoste, 'i', $code);
						$code = $_POST['txt_codeTypePoste'];
						$ok_typePoste = mysqli_stmt_execute($result_typePoste);
						if($ok_typePoste == false)
						{
							echo('Erreur dans la requete : '.$sql_typePoste);
						}
						else
						{
							$ok_typePoste = mysqli_stmt_bind_result($result_typePoste, $libelle, $interet);
							while(mysqli_stmt_fetch($result_connect))
							{
							?>
								<!--HTML-->
								<table>
									<tr>
										<td><label for="txt_libelleTypePoste">Libellé</label></td>
										<td><input type="text" name="txt_libelleTypePoste" id="form_txt" value="<?php echo($libelle);?>"></td>
									</tr>
									<tr>
										<td><label for="txt_interetTypePoste">Intérêt :</label></td>
										<td><textarea name="txt_interetTypePoste" id="form_txt" value="<?php echo($interet); ?>"></textarea></td>
									</tr>
								<!--HTML-->
							<?php
							}

								//Requete qui permettra d'affiche la liste des compétences nécessaires pour ce poste.
								$sql_competences = 'SELECT idCompetence, libelleCompetence FROM COMPETENCE';
								$result_competences = mysqli_prepare($con, $sql_competences);
								$ok_competences = mysqli_stmt_execute($result_competences);
								if($ok_competences == false)
								{
									header('Location: modifierTypePoste.php?err=1&q='.$sql_competences);
								}
								else
								{
									$ok_competences = mysqli_stmt_bind_result($result_competences, $idCompetence, $libelleCompetence);
									while(mysqli_stmt_fetch($result_competences))
									{
									?>
										<!--HTML-->
										<tr>
											<td><label for="chk<?php echo($i); ?>"><?php echo($libelleCompetence); ?></label></td>
											<td><input type="checkbox" name="chk<?php echo($i); ?>" value="<?php echo($idCompetence); ?>"></td>
										</tr>
										<!--HTML-->
									<?php
									}
								}
							}
								
						echo('</table>');
					}
				}
				?>
		</section>
	</body>
</html>