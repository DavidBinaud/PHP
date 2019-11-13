<?php
	$ulogin = $u->get('login');
	echo "<p>Liste des Trajets(Passager) pour l'utilisateur " . $ulogin . ":";
	$uLoginUrl = rawurlencode($ulogin);
	foreach ($tab_t as $t) {
		$tIdURL = rawurlencode($t->get('id'));
        $tId = htmlspecialchars($t->get('id'));
		echo "<br>Trajet d' Id <a href=index.php?action=read&controller=trajet&id=$tIdURL > $tId </a>";
		if(Session::is_user($ulogin)){
        	echo   "(<a href=index.php?action=deleteTrajetFromUser&controller=utilisateur&idTrajet=$tIdURL&login=$uLoginUrl >Supprimer sa participation au Trajet</a>)";
       	}
	}
	echo "</p>";




?>