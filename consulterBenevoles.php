<?php
	session_start();
	//Connexon à la base de données
	require('connexion_bdd.php');
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Consulter les informations d'un bénévole</title>
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
			<h3 style="text-align:center;">Consulter les informations d'un bénévole</h3>
			<p style="text-align:center;">
				Saisissez le code d'un bénévole pour voir ses informations.
			</p>

			<hr>

			<form method="POST" action="consulterBenevoles.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_code">Code bénévole :</label></td>
						<td><input type="text" name="txt_code" id="form_txt" placeholder="Code du bénévole"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="SUBMIT" name="btn_ok" id="form_btn" value="Valider"></td></td>
					</tr>
				</table>
			</form>

			<?php
				if(isset($_POST['txt_code']))
				{
					$sql = 'SELECT * FROM BENEVOLE WHERE idBenevole='.$_POST['txt_code'];
					$resultat = mysqli_query($con, $sql);
					if($resultat == false)
					{
						echo('<span id="msg_err" style="margin-top:5px;">Erreur dans la requete. Ce bénévole n\'existe peut être pas</span>');
					}
					else
					{
						while($ligne = mysqli_fetch_assoc($resultat))
						{
						?>

							<hr>

							<table id="liste">
								<tr>
									<td>Login :</td>
									<td><?php echo($ligne['login']); ?></td>
								</tr>
								<tr>
									<td>Nom :</td>
									<td><?php echo($ligne['nom']); ?></td>
								</tr>
								<tr>
									<td>Prénom :</td>
									<td><?php echo($ligne['prenom']); ?></td>
								</tr>
								<tr>
									<td>Adresse :</td>
									<td><?php echo($ligne['adresse']); ?></td>
								</tr>
								<tr>
									<td>Code Postal :</td>
									<td><?php echo($ligne['codePostal']); ?></td>
								</tr>
								<tr>
									<td>Ville :</td>
									<td><?php echo($ligne['ville']); ?></td>
								</tr>
								<tr>
									<td>Pays :</td>
									<td><?php echo($ligne['pays']); ?></td>
								</tr>
								<tr>
									<td>Téléphone :</td>
									<td><?php echo($ligne['telephone']); ?></td>
								</tr>
								<tr>
									<td>Courriel</td>
									<td><?php echo($ligne['courriel']); ?></td>
								</tr>
								<tr>
									<td>Sexe :</td>
									<td><?php echo($ligne['sexe']); ?></td>
								</tr>
								<tr>
									<td>Date de naissance :</td>
									<td><?php echo($ligne['dateNaissance']); ?></td>
								</tr>
								<tr>
									<td>Taille :</td>
									<td><?php echo($ligne['taille']); ?></td>
								</tr>
								<tr>
									<td>Permis de conduire :</td>
									<td>
										<?php
											if($ligne['permisConduire'] == true)
											{
												echo('OUI');
											}
											else
											{
												echo('NON');
											}
										?>
									</td>
								</tr>
								<tr>
									<td>Diplome de secouriste :</td>
									<td>
										<?php
											if($ligne['diplomeSecouriste'] == true)
											{
												echo('OUI');
											}
											else
											{
												echo('NON');
											}
										?>
									</td>
								</tr>
								<tr>
									<td>Niveau de randonnée :</td>
									<td><?php echo($ligne['niveauRando']); ?></td>
								</tr>
								<tr>
									<td>Niveau en informatique :</td>
									<td><?php echo($ligne['niveauInfo']); ?></td>
								</tr>
								<tr>
									<td>Souhait poste :</td>
									<td><?php echo($ligne['idTypePoste']); ?></td>
								</tr>
								<tr>
									<td>Souhait centre :</td>
									<td><?php echo($ligne['idCentre']); ?></td>
								</tr>
							</table>
						<?php
						}
					}
				}
			?>
		</section>
	</body>
</html>