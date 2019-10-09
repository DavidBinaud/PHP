<?php

    foreach ($tab_v as $v){
        $vImmatriculationURL = rawurlencode($v->getImmatriculation());
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        echo <<<EOT
        	<p> Voiture d'immatriculation  <a href=index.php?action=read&controller=voiture&immatriculation=$vImmatriculationURL > $vImmatriculation </a> 
        	(<a href=index.php?action=delete&controller=voiture&immatriculation=$vImmatriculationURL > Supprimer</a>)</p>
EOT;
    }
?>
