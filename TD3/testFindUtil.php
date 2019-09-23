<?php

	require_once 'Trajet.php';
	require_once 'User.php';



	$tab_user = Trajet::findPassagers($_GET["id_trajet"]);

	if(!Empty($tab_user)){
		foreach ($tab_user as $key => $user) {
			echo "<p>" . $user->afficher() . "</p>";
		}
	}
	else{
		echo "aucun resultat";
	}



?>