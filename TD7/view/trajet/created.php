<?php
	echo "<p>Le Trajet a bien été créée !</p>";
	require File::build_path(array("view",static::$object,"list.php"));
?>