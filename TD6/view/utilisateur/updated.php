<?php

	$login = htmlspecialchars($_GET['login']);
	echo "L'utilisateur de login ' " . $login . " a bien été mise à jour.";
	require File::build_path(array("view",static::$object,"list.php"));

?>