<?php
	session_start();

	//Vérifie s'il y a un message à afficher
	//Message d'erreur
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = 'Certains champs ne sont pas saisis';
			break;
			case 2:
				$message = 'Certains champs ne sont pas remplis correctement';
			break;
			case 3:
				$message = 'Erreur dans la requete ';
				if(isset($_GET['q']))
				{
					$message = $message.':<br/>'.$_GET['q'];
				}
			break;
			default:
			break;
		}

		$message = ('<span id="msg_err">'.$message.'</span>');
	}

	//Message de confirmation
	if(isset($_GET['add']))
	{
		switch($_GET['add'])
		{
			case 1:
				$message = 'Modifications enregistrées';
			break;
			default:
			break;
		}

		$message = ('<span id="msg_add">'.$message.'</span>');
	}

	//Vérifie si tous les champs sont saisis
	if(isset($_POST['lst_centre']) && isset($_POST['lst_poste']))
	{
		//Connexion à la base
		$con = mysqli_connect('localhost', 'root', '', 'utmb');

		//Préparation de la requete
		$sql = 'UPDATE SET idTypePoste = ?, idCentre = ? WHERE idBenevole = ?';
		$requete = mysqli_prepare($con, $sql);
		$ok = mysqli_stmt_bind_param($requete, 'iii', $idTypePoste, $idCentre, $idBenevole);
		$idTypePoste = $_POST['lst_poste'];
		$idCentre = $_POST['lst_poste'];
		$idBenevole = $_SESSION['idBenevole'];

		//Envoi de la requete
		$ok = mysqli_stmt_execute($requete);
		if($ok == false)
		{
			header('Location: emettreSouhaits.php?err=3&q='.$sql);
		}
		else
		{
			header('Location: emettreSouhaits.php?add=1');
		}

		mysqli_stmt_close($requete);
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Connexion</title>
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
			<h3>Emettre mes souhaits</h5>

			<?php
				if(isset($message))
				{
					echo($message);
				}
			?>

			<hr>

			<form method="POST" action="emettreSouhaits.php">
				<table>
					<tr>
						<td><label for="lst_centre">Choisir un centre :</label></td>
						<td>
							<?php
								$con = mysqli_connect('localhost', 'root', '', 'utmb');
								$sql_centre = 'SELECT idCentre, libelleCentre FROM CENTRE';
								$resultat_centre = mysqli_query($con, $sql_centre);
								echo('<select name="lst_centre">');
								while($ligne = mysqli_fetch_assoc($resultat_centre))
								{
								?>
									<option value="<?php echo($ligne['idCentre']);?>"><?php echo($ligne['libelleCentre']);?></option>
								<?php
								}
								echo('</select>');
							?>
						</td>
					</tr>
					<tr>
						<td><label for="lst_poste">Choisir un poste :</label></td>
						<td>	
							<?php
								$sql_poste = 'SELECT idTypePoste, libelleTypePoste FROM TYPEPOSTE';
								$resultat_poste = mysqli_query($con, $sql_poste);
								echo('<select name="lst_poste">');
								while($ligne = mysqli_fetch_assoc($resultat_poste))
								{
								?>
									<option value="<?php echo($ligne['idTypePoste']);?>"><?php echo($ligne['libelleTypePoste']);?></option>
								<?php
								}
								echo('</select>');
							?>
						</td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="SUBMIT" name="btn_ok" id="form_btn" value="Valider"></td>
					</tr>
				</table>
		</section>
	</body>
</html>