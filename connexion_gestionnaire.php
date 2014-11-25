<?php
	session_start();

	//Vérifie si un l'utilisateur est déjà connecté
	if(isset($_SESSION['connecte']))
	{
		header('Location: index.php');
	}

	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = ('La combinaison login/motdepasse est erronée.');
			break;
			default:
				//Vide
			break;
		}
	}

	if(isset($_POST['txt_login']) && !empty($_POST['txt_login']))
	{
		if(isset($_POST['txt_mdp']) && !empty($_POST['txt_mdp']))
		{
			if($_POST['txt_login'] == 'utmb' && $_POST['txt_mdp'] == 'tvn595')
			{
				$_SESSION['connecte'] = true;
				$_SESSION['gestionnaire'] = true;
				header('Location: index.php');
			}
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
			<?php //include('menu.php'); ?>
		</nav>

		<section class="centre" style="text-align:center;">
			<h3>Gestion</h3>
			<?php
				if(isset($message))
				{
					echo('<span id="msg_err">'.$message.'</span>');
				}
			?>
			<p>
				Pour continuer en tant que gestionnaire, veuillez vous connecter.
			</p>

			<hr>

			<form method="POST" action="connexion_gestionnaire.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_login">Login :</label></td>
						<td><input type="text" name="txt_login" id="form_txt" placeholder="Identifiant"></td>
					</tr>
					<tr>
						<td><label for="txt_mdp">Mot de passe :</label></td>
						<td><input type="password" name="txt_mdp" id="form_txt" placeholder="Mot de passe"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="submit" name="btn_ok" id="form_btn" size="100" value="Valider"></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>