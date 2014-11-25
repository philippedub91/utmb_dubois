<?php
	session_start();
	if(isset($_SESSION['connection']) && $_SESSION['connecte'] == true)
	{
		header('Location: index.php');
	}

	if(isset($_POST['txt_nom']) && isset($_POST['txt_prenom']) && isset($_POST['txt_naissance']))
	{
		if(!empty($_POST['txt_nom']) && !empty($_POST['txt_prenom']) && !empty($_POST['txt_naissance']))
		{
			if(isset($_POST['txt_login']) && isset($_POST['txt_mdp']) && isset($_POST['txt_mdp_rep']))
			{
				if(!empty($_POST['txt_login']) && !empty($_POST['txt_mdp']) && !empty($_POST['txt_mdp_test']))
				{
					if($_POST['txt_mdp'] == $_POST['txt_mdp_rep'])
					{
						if(isset($_POST['txt_courriel']) && !empty($_POST['txt_courriel']))
						{
							//Traitements.
						}
						else
						{
							header('Location: inscription.php?err=3');
						}
					}
					else
					{
						header('Location: inscription.php?err=2');
					}
				}
				else
				{
					header('Location: inscription.php?err=1');
				}
			}
		}
		else
		{
			header('Location: inscription.php?err=1');
		}
	}

	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = ('Il faut remplir tous les champs');
			break;

			case 2:
				$message = ('Les deux mots de passe saisis ne correspondent pas');
			break;

			case 3:
				$message = ('Vous n\'avez pas saisi une adresse mail valide');
			break;

			default:
			break;
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>The North Face Ultra-Trail - Inscription</title>
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
			<h3 style="text-align:center;">Inscription</h3>

			<?php
				if(isset($message))
				{
					echo('<span class="msg_err">'.$message.'</span>');
				}
			?>

			<hr>

			<form method="POST" action="inscription.php">
				<table style="margin-left:auto; margin-right:auto; text-align:none;">
					<tr>
						<td><h5>Identité<hr></h5></td>
					</tr>

					<!--Nom-->
					<tr>
						<td><label for="txt_nom">Nom :</label></td>
						<td><input type="text" name="txt_nom" id="form_txt" required="required">*</td>
					</tr>

					<!--Prénom-->
					<tr>
						<td><label for="txt_prenom">Prénom :</label></td>
						<td><input type="text" name="txt_prenom" id="form_txt" required="required">*</td>
					</tr>

					<!--Date de naissance-->
					<tr>
						<td><label for="txt_naissance">Naissance :</label></td>
						<td><input type="text" name="txt_naissance" id="form_txt" required="required" placeholder="AAAA-MM-JJ">*</td>
					</tr>

					<tr>
						<td><h5>Identifiants<hr></h5></td>
					</tr>

					<!--login-->
					<tr>
						<td><label for="txt_login">Login :</label></td>
						<td><input type="text" name="txt_login" id="form_txt" required="required">*</td>
					</tr>

					<!--Mot de passe-->
					<tr>
						<td><label for="txt_mdp">Mot de passe :</label></td>
						<td><input type="password" name="txt_mdp" id="form_txt" required="required">*</td>
					</tr>

					<!--Repéter mot de passe-->
					<tr>
						<td><label for="txt_mdp_rep">Répéter :</label></td>
						<td><input type="password" name="txt_mdp_rep" id="form_txt" required="required">*</td>
					</tr>

					<tr>
						<td><!--Vide--></td>
						<td><input type="SUBMIT" value="Créer le compte" id="form_btn"></td>
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>