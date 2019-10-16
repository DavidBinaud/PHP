<?php

    foreach ($tab_v as $v){
        $vImmatriculationURL = rawurlencode($v->get('immatriculation'));
        $vImmatriculation = htmlspecialchars($v->get('immatriculation'));
        echo <<<EOT
        	<p> Voiture d'immatriculation  <a href=index.php?action=read&controller=voiture&immatriculation=$vImmatriculationURL > $vImmatriculation </a> 
        	 (<a href=index.php?action=delete&controller=voiture&immatriculation=$vImmatriculationURL >Supprimer</a>)</p>
EOT;
    }
    echo "<p> <a href=\"index.php?action=create&controller=voiture\" >Créer une Voiture</a></p>";
?>
