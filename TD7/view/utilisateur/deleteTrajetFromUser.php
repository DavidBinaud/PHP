<?php
	$uIdDeleted = htmlspecialchars($_GET['idTrajet']);
	require (File::build_path(array("view",static::$object,"detail.php"))); 
	echo "La participation de l'utilisateur au trajet d'id " . $uIdDeleted . " a été annulée";

?>