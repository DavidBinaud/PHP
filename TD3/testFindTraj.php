<?php

	require_once 'Trajet.php';
	require_once 'User.php';



	$tab_trajet = USER::findTrajets($_GET["login"]);

	if(!Empty($tab_trajet)){
		foreach ($tab_trajet as $key => $trajet) {
			echo "<p>" . $trajet->afficher() . "</p>";
		}
	}
	else{
		echo "utilisateur passager d'aucun trajet";
	}



?>