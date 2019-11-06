<?php
	echo "<p>L'utilisateur a bien été créé !</p>";
	require File::build_path(array("view",static::$object,"list.php"));
?>