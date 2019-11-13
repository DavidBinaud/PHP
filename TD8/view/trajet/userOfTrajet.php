<?php
	echo "<p> Liste Passagers pour le Trajet " . htmlspecialchars($t->get('id')) . ":";
	$idURL = rawurlencode($t->get('id'));
	foreach ($tab_u as $u) {
		$uLoginURL = rawurlencode($u->get('login'));
        $uLogin = htmlspecialchars($u->get('login'));
		echo "<br> Passager de login <a href=index.php?action=read&controller=utilisateur&login=$uLoginURL > $uLogin </a>
		(<a href=index.php?action=deletePassagerFromTrajet&controller=trajet&loginPassager=$uLoginURL&id=$idURL >Supprimer Du Trajet</a>)";
	}
	
	$nbPassagers = count($tab_u);
	if($nbPassagers < $t->get('nbplaces')){
		echo "<br> (<a href=index.php?action=addPassagerToTrajet&controller=trajet&id=$idURL >Ajouter un Passager</a>)";
	}
	echo "</p>";
?>