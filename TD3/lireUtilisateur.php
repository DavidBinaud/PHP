<?php

	require_once "User.php";


	$tab_user = User::getAllUtilisateurs();

	foreach ($tab_user as $key => $user) {
		echo "<p>" . $user->afficher() . "</p>";
	}


?>