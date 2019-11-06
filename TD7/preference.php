<?php

	if (isset($_POST['preference'])) {
		setcookie("preference",$_POST['preference'], time() +1800);
		$pref_accueil = $_POST['preference'];
	}
	//echo "Cookie set.<br><a href=index.php>retour à l'accueil</a>";

	require "index.php";
?>