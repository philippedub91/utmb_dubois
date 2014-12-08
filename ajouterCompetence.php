-<?php
	session_start();
	
	//Permet de se connecter à la base de données
	require_once('connexion_bdd.php');

	//Si il une erreur est rencontrée
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 0:
				$message = 'Erreur d\'execution';
			break;
			case 1:
				$message = 'Vous n\'avez pas rempli tous les champs requis';
			break;
			case 2:
				$message = 'Le code d\'une compétence doit faire 3 caractères max';
			break;
			case 3:
				$message = 'Le code d\'une compétence ne comporte pas de chiffres';
			break;
			default:
			break;
		}
	}

	//Si la compétence a été ajoutée
	if(isset($_GET['add']))
	{
		switch($_GET['add'])
		{
			case 1:
				$message = 'Compétence ajoutée';
			break;
			default:
			break;
		}
	}

	if(isset($_POST['txt_code']) && isset($_POST['txt_libelle']))
	{
		if(!empty($_POST['txt_code']) && !empty($_POST['txt_libelle']))
		{
			if(strlen($_POST['txt_code']) == 3)
			{
				if(!is_numeric($_POST['txt_code']))
				{
					//Connexion à la base et envoi de la requete
					$sql = 'INSERT INTO COMPETENCE(idCompetence, libelleCompetence) VALUES (?,?)';
					$requete = mysqli_prepare($con, $sql);
					$ok = mysqli_stmt_bind_param($requete, 'ss', $code, $libelle);
					$code = $_POST['txt_code'];
					$libelle = $_POST['txt_libelle'];
					$ok = mysqli_stmt_execute($requete);
					if($ok == false)
					{
						header('Location: ajouterCompetence.php?err=0');
					}
					else
					{
						header('Location: ajouterCompetence.php?add=1');
					}
					mysqli_stmt_close($requete);
				}
				else
				{
					header('Location: ajouterCompetence.php?err=3');
				}
			}
			else
			{
				header('Location: ajouterCompetence.php?err=2');
			}

		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Ajouter une compétence</title>
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

		<section class="centre" style="text-align:center;">
			<h3 style="text-align:center;">Ajouter une compétence</h3>
			<?php
				if(isset($message))
				{
					echo('<span id="msg_err">'.$message.'</span>');
				}
			?>

			<hr>

			<form method="POST" action="ajouterCompetence.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_code">Code :</label></td>
						<td><input type="text" name="txt_code" id="form_txt"></td>
					</tr>
					<tr>
						<td><label for="txt_libelle">Libelle :</label></td>
						<td><input type="text" name="txt_libelle" id="form_txt"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="submit" name="btn_ok" id="form_btn" size="100" value="Valider"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><a href="competences.php">Afficher la liste des compétences</a></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>