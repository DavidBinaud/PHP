<?php
    $vImmatriculation = htmlspecialchars($v->get('immatriculation'));
    $vImmatriculationURL = rawurlencode($v->get('immatriculation'));
    $vMarque = htmlspecialchars($v->get('marque'));
    $vCouleur = htmlspecialchars($v->get('couleur'));
    echo <<<EOT
        	<p> Voiture d'immatriculation $vImmatriculation, de marque $vMarque et de couleur $vCouleur.
        	(<a href=index.php?action=update&controller=voiture&immatriculation=$vImmatriculationURL >Mettre A Jour</a>)</p>
EOT;
?>
