<?php
	
	require_once "Trajet.php";


	$tab_trajet = Trajet::getAllTrajets();

	foreach ($tab_trajet as $key => $trajet) {
		echo "<p>" . $trajet->afficher() . "</p>";
	}




?>