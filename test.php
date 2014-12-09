<?php
	session_start();

	$CLE1 = md5('anaheim1955');
	$CLE2 = md5('1917orlando');

	if(isset($_POST['txt_mdp']) && !empty($_POST['txt_mdp']))
	{
		$sha1mdp = sha1($CLE1.sha1($_POST['txt_mdp']).$CLE2);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Coder md5/sha1</title>
	</head>

	<body>
		<form method="POST" action="test.php">
			<label for="txt_mdp">Saisir le mot de passe à coder</label>
			<input type="text" name="txt_mdp">
			<input type="submit" value="encoder">
		</form>

		<?php
			session_destroy();

			if(isset($sha1mdp))
			{
				echo('Mot de passe encodé : '.$sha1mdp);
			}

			if(isset($_SESSION['connecte']))
			{
				echo('<span style="color:green;">Fermeture de session</span>');
				session_destroy();
			}
			else
			{
				echo('<span style="color:red;">Aucune session initialisée</span>');
			}
		?>

		<?php
			$con = mysqli_connect('localhost:8888', 'utmb', 'tvn595', 'utmb');
			$requete = 'SELECT * FROM BENEVOLE';
			$sql = mysqli_query($requete);
			while($ligne[] = mysqli_fetch($sql))
			{
				echo($ligne[]);
			}
		?>


	</body>
</html>