<?php

    foreach ($tab_v as $v){
        $vImmatriculationURL = rawurlencode($v->get('immatriculation'));
        $vImmatriculation = htmlspecialchars($v->get('immatriculation'));
        echo "<p> Voiture d'immatriculation  <a href=index.php?action=read&controller=voiture&immatriculation=$vImmatriculationURL > $vImmatriculation </a>";
        if(Session::is_admin()){
        	echo "(<a href=index.php?action=delete&controller=voiture&immatriculation=$vImmatriculationURL >Supprimer</a>)</p>";
        }
    }
    if(Session::is_admin()){
    	echo "<p> <a href=\"index.php?action=create&controller=voiture\" >Créer une Voiture</a></p>";
	}

	require (File::build_path(array("view",static::$object,"listTable.php")));

?>
