<?php

	$immat = htmlspecialchars($_GET['immatriculation']);
	echo "La voiture d'immatriculation " . $immat . " a bien été mise à jour.";
	require File::build_path(array("view",$controller,"list.php"));

?>