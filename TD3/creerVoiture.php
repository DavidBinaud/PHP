<?php


require_once('./Voiture.php');

/*	
	if(!empty($_GET)){
		$voiture1 = new Voiture($_GET['marque'],$_GET['couleur'],$_GET['immatriculation']);

		$voiture1->afficher();
	}
	else{ echo "Aucune information sur la voiture transmise";}
*/
//Changer la méthode de recupération dans formulairevoiture.html en post ou get
	if(!empty($_POST)){
		$voiture1 = new Voiture($_POST['marque'],$_POST['couleur'],$_POST['immatriculation']);

		Voiture::save($voiture1);
	}
	else{ echo "Aucune information sur la voiture transmise";}


?>