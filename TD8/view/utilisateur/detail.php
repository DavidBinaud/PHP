<?php
    $uLogin = htmlspecialchars($u->get('login'));
    $uLoginURL = rawurlencode($u->get('login'));
    $uNom = htmlspecialchars($u->get('nom'));
    $uPrenom = htmlspecialchars($u->get('prenom'));
    echo "<p> Utilisateur de login $uLogin, de nom $uNom et de prenom $uPrenom.";

    if(Session::is_user($uLogin)){
        	echo "(<a href=index.php?action=update&controller=utilisateur&login=$uLoginURL >Mettre A Jour</a>)
        	(<a href=index.php?action=delete&controller=utilisateur&login=$uLoginURL >Supprimer</a>)</p>";
    }else{
    	echo "</p>";
    }

	

	require (File::build_path(array("view",static::$object,"trajetUser.php")));
?>
