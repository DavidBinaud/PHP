<?php
	echo "<p>Liste des Trajets(Passager) pour l'utilisateur " . $u->get('login') . ":";
	$uLoginUrl = rawurlencode($u->get('login'));
	foreach ($tab_t as $t) {
		$tIdURL = rawurlencode($t->get('id'));
        $tId = htmlspecialchars($t->get('id'));
		echo "<br>Trajet d' Id <a href=index.php?action=read&controller=trajet&id=$tIdURL > $tId </a> 
        	   --(<a href=index.php?action=deleteTrajetFromUser&controller=utilisateur&idTrajet=$tIdURL&login=$uLoginUrl >Supprimer sa participation au Trajet</a>)";
	}
	echo "</p>";




?>