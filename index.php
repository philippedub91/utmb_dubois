<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>UTMB</title>

		<?php include('ajouterCentreTraitements.php'); ?>

	</head>
	<body style="margin:0px; font-family:arial;">
		<header style="background-color:rgb(92, 154, 236);">
			<img src="img/logo.jpg" height="150">
		</header>

		<nav style="background-color:rgb(228, 27, 27); padding-left:10px;">
			<ul style="display: inline; color:white;">
				<li>Centre</li>
				<li>Compétences</li>
				<li>Bénévoles</li>
			</ul>
		</nav>

		<section style="padding:10px;">
			<h1>Ajouter un centre :</h1>
			<hr>
			<?php
				if(!$enregistre)
				{
				?>
					<form method="POST" action="ajouterCompetence.php">
						<label for="txt_libelle">Libelle :</label>
						<input type="text" name="txt_libelle" id="txt_form">
						<br />

						<label for="lst_plage">Plage horaire :</label>
						<select name="lst_plageDebut">
							<option value="Du vendredi matin au samedi après-midi">Du vendredi matin au samedi après-midi</option>
							<option value="Du vendredi après-midi au "
						</select>

						<select name="lst_plageFin">
							<option value="matin">

						<br />
						<br />

						<label>Nb Bénévoles</label><br />

						<table>
							<tr>
								<td>
									<!--Vide-->
								</td>
								<td>
									Nb Bénévoles :
								</td>
							</tr>
							<tr>
								<td>
									<label for="txt_poste1">Equipe Technique</label>
								</td>
								<td>
									<input type="text" name="txt_poste1" id="txt_form" size="2">
								</td>
							</tr>
							<tr>
								<td>
									<label for="txt_poste2">Secours</label>
								</td>
								<td>
									<input type="text" name="txt_poste2" id="txt_form" size="2">
								</td>
							</tr>
							<tr>
								<td>
									<label for="txt_poste3">Contrôle informatique</label>
								</td>
								<td>
									<input type="text" name="txt_poste3" id="txt_form" size="2">
								</td>
							</tr>
							<tr>
								<td>
									<label for="txt_poste4">Ravitaillement</label>
								</td>
								<td>
									<input type="text" name="txt_poste4" id="txt_form" size="2">
								</td>
							</tr>
						</table>

						<br />

						<input type="submit" value="Valider">
					</form>
				<?php
				}
				else
				{
				?>

					Compétence ajoutée !<br />

				<?php
				}
				?>

				<a href="#">Revenir au menu</a>
	</body>
</html>