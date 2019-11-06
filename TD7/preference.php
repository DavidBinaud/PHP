<?php

	if (isset($_POST['preference'])) {
		setcookie("preference",$_POST['preference'], time() +1800);
	}
	echo "Cookie set.<br><a href=index.php>retour à l'accueil</a>";
?>