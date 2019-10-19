<?php

	require (File::build_path(array("view",static::$object,"detail.php")));
	echo "Liste des Trajets pour l'utilisateur " . $u->get('login') . ":";
	foreach ($tab_t as $t) {
		require (File::build_path(array("view","trajet","detail.php")));
	}




?>