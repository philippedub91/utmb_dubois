<?php

//Vérification des données du formulaire 

try
{
	//Vérification du champ txt_libelle
	if(isset($_POST['txt_libelle']) & !empty($_POST['txt_libelle']))
	{
		$libelle = $_POST['libelle'];
	}
	else
	{
		throw new Exception('Le libelle de la compétence n\'est pas renseigné.');
	}


	//Vérification du champ lst_plage
	if(isset($_POST['lst_plage']))
	{
		$plage = $_POST['lst_plage'];
	}
	else
	{
		throw new Exception('Aucune plage horaire sélectionnée.');
	}

	//Vérification des champs txt_poste
	for($i = 1; $i < 5; $i++)
	{
		if(isset($_POST['txt_poste'.$i]) & !empty($_POST['txt_poste'].$i))
		{
			$capacitePoste[$i] = $_POST['txt_poste'.$i];
		}
		else
		{
			throw new Exception('Capacité manquante pour un des postes');
		}
	}

	include('bddconnect.php');
}





//Connexion à la base de données
try{
	if($con =  mysqli_connect('127.0.0.1', 'root', ''))
	{
		if($base = mysqli_select_db($con, 'utmb'))
		{
			//Connexion réussi
		}
		else
		{
			throw new Exception('La connexion à la base de données à échouée.');
		}
	}
	else
	{
		throw new Exception('La connexion au serveur de la base de données à échouée.');
	}



//Insertion des données dans la base
$requete = ('INSERT INTO ')


catch(Exception $e)
{
	echo('Une erreur rencontrée : ' . $e.getMessage());
}