<?php
	session_start();

	//Connexion à la base de données
	require('connexion_bdd.php');

	//Vérifie si l'utilisateur à les autorisations
	//Sinon le redirige soit vers l'index soit vers la page de connexion.
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

		<section class="centre">
			<?php
				//Connexion à la base
				$requete = 'SELECT idCompetence, libelleCompetence FROM COMPETENCE';

				//Envoi de la requete
				$resultat = mysqli_query($con, $requete);
				if($resultat == false)
				{
					echo('Erreur requete');
				}
				else
				{
					//Affichage des données
				?>
					<h3 style="text-align:center;">Liste des compétences</h3>

					<hr>

					<table>
						<tr style="font-weight:bold;">
							<td>Code</td>
							<td>Libelle</td>
						</tr>
					<?php
						//Exploitation de la requete
						while($ligne = mysqli_fetch_assoc($resultat))
						{
						?>
							<tr>
								<td><?php echo($ligne['idCompetence']); ?></td>
								<td><?php echo($ligne['libelleCompetence']); ?></td>
							</tr>
						<?php
						}
					}

				//Déconnexion de la base
				mysqli_close($con);
			?>
			</table>
		</section>
	</body>
</html>