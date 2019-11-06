<?php
	$uLoginAdded = htmlspecialchars($_GET['loginPassager']);
	require (File::build_path(array("view",static::$object,"detail.php"))); 
	echo "Le Passager de login " . $uLoginAdded . " a été ajouté au Trajet";

?>