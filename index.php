<?php
	session_start();

	//Vérifie si l'utilisateur est connecté
	if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == 'connecte')
	{
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
				</nav>

				<section class="centre" style="text-align:center;">
					<h3>
						<?php
							if(isset($_SESSION['prenom']))
							{
								echo('Que voulez-vous faire '.$_SESSION['prenom'].' ?');
							}
							else
							{
								echo('Menu');
							}
						?>
					</h3>

					<hr>

			<?php
			//S'il est gestionnaire
			if(isset($_SESSION['gestionnaire']) && $_SESSION['gestionnaire'] == true)
			{
			?>

				<ul>
					<li><a href="ajouterCentre.php">Ajouter des centres</a></li>
					<li><a href="ajouterCompetence.php">Ajouter des compétences</a></li>
					<li><a href="ajouterTypePoste.php">Ajouter des types de poste</a></li>
					<li><a href="modifierTypePoste.php">Modifier un type de poste</a></li>
				</ul>

				<hr>

				<ul>
					<li><a href="modifierTypePoste.php">Modifier les Types de Postes</a></li>
					<li><a href="associerCompetence.php">Associer les compétences</a></li>
				</ul>

				<hr>

				<ul>
					<li><a href="afficherCompetences.php">Afficher la liste des compétences</a></li>
				</ul>
			<?php
			}
			else
			{
				//Seulement si l'utilisateur est bénévole (verifie si la variable de session login est initialisée)
				if(isset($_SESSION['login']))
				{
				?>
					<ul>
						<li><a href="modifierInfos.php">Modifier mes informations</a></li>
						<li><a href="emettreSouhaits.php">Emettre mes souhaits</a></li>
					</ul>
				<?php
				}
			}
			?>

			<ul>
				<li><a href="souhaitsCentre.php">Consulter les souhaits par centre</a></li>
				<li><a href="souhaitsPoste.php">Consulter les souhaits par poste</a></li>
			</ul>

			<hr>
				<a href="deconnexion.php"><img src="img/deconnexion.png" height="50" title="Fermer la session" alt="Fermer la session"></a>

		</section>
	</body>
</html>
		<?php
		}
		else
		{
			header('Location:	connexion.php');
		}