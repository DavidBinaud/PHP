<?php
	$uLoginDeleted = htmlspecialchars($_GET['loginPassager']);
	require (File::build_path(array("view",static::$object,"detail.php"))); 
	echo "Le Passager de login " . $uLoginDeleted . " a été supprimé du Trajet";

?>