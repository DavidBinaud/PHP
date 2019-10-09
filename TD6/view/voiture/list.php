<?php

    foreach ($tab_v as $v){
        $vImmatriculationURL = rawurlencode($v->getImmatriculation());
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        echo '<p> Voiture d\'immatriculation ' . "<a href=\"index.php?action=read&immatriculation=" . $vImmatriculationURL . '">' . $vImmatriculation ."</a> (" . "<a href=\"index.php?action=delete&immatriculation=" . $vImmatriculationURL . '">' ."Supprimer</a>)</p>" ;
    }
?>
