<?php

    foreach ($tab_u as $u){
        $uLoginURL = rawurlencode($u->get('login'));
        $uLogin = htmlspecialchars($u->get('login'));
        echo <<<EOT
        	<p> Utilisateur de login <a href=index.php?action=read&controller=utilisateur&login=$uLoginURL > $uLogin </a> 
        	 (<a href=index.php?action=delete&controller=utilisateur&login=$uLoginURL >Supprimer</a>)</p>
EOT;
    }
    echo "<p> <a href=\"index.php?action=create&controller=utilisateur\" >Créer un Utilisateur</a></p>";
?>