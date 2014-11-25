<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Consulter les souhaits par centres</title>
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
			<h3 style="text-align:center;">Consulter les souhaits par centre</h3>
			<p style="text-align:center;">
				Choisissez un poste pour afficher les bénévoles correspondants.
			</p>

			<hr>

			<form method="POST" action="souhaitsCentre.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="lst_centre">Sélectionner un poste :</label></td>
						<td>
							<select name="lst_centre">
								<?php
									//Affiche la liste des postes
									$con = mysqli_connect('localhost', 'root', '', 'utmb');
									$sql_lst = 'SELECT idCentre, libelleCentre FROM CENTRE';
									$resultat_lst = mysqli_query($con, $sql_lst);
									while($ligne = mysqli_fetch_assoc($resultat_lst))
									{
									?>
										<option value="<?php echo($ligne['idCentre']);?>"><?php echo($ligne['libelleCentre']);?></option>
								<?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="SUBMIT" name="btn_ok" id="form_btn" value="Valider"></td></td>
					</tr>
				</table>
			</form>

			<hr>

			<table style="margin-left:auto; margin-right:auto;">
				<tr>
					<td>Code</td>
					<td>Nom</td>
					<td>Prénom</td>
				</tr>

			<?php
				if(isset($_POST['lst_centre']))
				{
					//Affichage de la liste des bénévoles ayant fait ce souhait
					$sql_ben = 'SELECT idBenevole, nom, prenom FROM BENEVOLE WHERE idCentre = '.$_POST['lst_centre'];
					$resultat_ben = mysqli_query($con, $sql_ben);
					while($ligne = mysqli_fetch_assoc($resultat_ben))
					{
					?>
						<tr>
						<td><?php echo($ligne['idBenevole']);?></td>
							<td><?php echo($ligne['nom']);?></td>
							<td><?php echo($ligne['prenom']);?></td>
						</tr>
				<?php
					}
				}	
			?>
			</table>
		</section>
	</body>
</html>