<?php
    $vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $vImmatriculationURL = rawurlencode($v->getImmatriculation());
    $vMarque = htmlspecialchars($v->getMarque());
    $vCouleur = htmlspecialchars($v->getCouleur());
    echo <<<EOT
        	<p> Voiture d'immatriculation $vImmatriculation, de marque $vMarque et de couleur $vCouleur.
        	(<a href=index.php?action=update&controller=voiture&immatriculation=$vImmatriculationURL >Mettre A Jour</a>)</p>
EOT;
?>
