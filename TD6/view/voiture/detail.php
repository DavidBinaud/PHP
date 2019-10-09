<?php
    $vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $vMarque = htmlspecialchars($v->getMarque());
    $vCouleur = htmlspecialchars($v->getCouleur());
    echo "voiture " . $vImmatriculation . " de marque " . $vMarque . " (couleur " . $vCouleur . ")";
?>
