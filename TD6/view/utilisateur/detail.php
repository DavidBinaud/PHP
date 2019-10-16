<?php
    $uLogin = htmlspecialchars($u->get('login'));
    $uLoginURL = rawurlencode($u->get('login'));
    $uNom = htmlspecialchars($u->get('nom'));
    $uPrenom = htmlspecialchars($u->get('prenom'));
    echo <<<EOT
        	<p> Utilisateur de login $uLogin, de nom $uNom et de prenom $uPrenom.
        	(<a href=index.php?action=update&controller=utilisateur&login=$uLoginURL >Mettre A Jour</a>)</p>
EOT;
?>
