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
				$message = ('Nous avons rencontré un problème avec la base de données. Réessayez dans quelques minutes.');
			break;
			case 2:
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
			//Connexion à la base de données
			$con = mysqli_connect('localhost', 'root', '', 'utmb');

			//Ecriture, preparation et envoi de la requete
			$sql_verif = ('SELECT count(*) FROM BENEVOLE WHERE login = ? AND mdp = ?');
			$result_verif = mysqli_prepare($con, $sql_verif);
			$ok = mysqli_stmt_bind_param($result_verif, 'ss', $login, $mdp);
			$login = $_POST['txt_login'];
			$mdp = sha1($_POST['txt_mdp']);

			$ok = mysqli_stmt_execute($result_verif);
			if($ok == false)
			{
				header('Location: connexion.php?err=1');
			}
			else
			{
				$ok = mysqli_stmt_bind_result($result_verif, $compteur);
				while(mysqli_stmt_fetch($result_verif))
				{
					if($compteur == 1)
					{
						$verif  = true;
					}
					else
					{
						header('Location: connexion.php?err=2');
					}
			
				}
			}


			if(isset($verif) && $verif == true)
			{
				//$con = mysqli_connect('localhost', 'root', '', 'utmb');
				$sql_connect = 'SELECT idBenevole, login, nom, prenom FROM BENEVOLE WHERE login= ? AND mdp= ?';
				$result_connect = mysqli_prepare($con, $sql_connect);
				$ok_connect = mysqli_stmt_bind_param($result_connect, 'ss', $login, $mdp);
				$login = $_POST['txt_login'];
				$mdp = sha1($_POST['txt_mdp']);
				$ok_connect = mysqli_stmt_execute($result_connect);
				if($ok_connect == false)
				{
					header('Location: connexion.php?err=1');
				}
				else
				{
					$ok = mysqli_stmt_bind_result($result_connect, $idBenevole, $login, $nomBenevole, $prenomBenevole);
					while(mysqli_stmt_fetch($result_connect))
					{
						$_SESSION['idBenevole'] = $idBenevole;
						$_SESSION['login'] = $login;
						$_SESSION['nom'] = $nomBenevole;
						$_SESSION['prenom'] = $prenomBenevole;
						$_SESSION['connecte'] = true;

						header('Location: index.php');
 					}
				}
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
			<h3>Connexion</h3>
			<?php
				if(isset($message))
				{
					echo('<span id="msg_err">'.$message.'</span>');
				}
			?>
			<p>
				Pour continuer, veuillez vous connecter.
			</p>

			<hr>

			<form method="POST" action="connexion.php">
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
					<tr>
						<td><!--vide--></td>
						<td><a href="inscription.php">Créer un compte</a></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><a href="connexion_gestionnaire.php">Mode gestion</a></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>