<?php
    $vImmatriculation = htmlspecialchars($immat);
    echo '<p> La Voiture d\'immatriculation ' . $vImmatriculation . " a bien été supprimée.</p>";
    require File::build_path(array("view",$controller,"list.php"));
?>
