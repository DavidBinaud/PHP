<?php
    $vImmatriculation = htmlspecialchars($v->get('immatriculation'));
    $vImmatriculationURL = rawurlencode($v->get('immatriculation'));
    $vMarque = htmlspecialchars($v->get('marque'));
    $vCouleur = htmlspecialchars($v->get('couleur'));
    echo "<p> Voiture d'immatriculation $vImmatriculation, de marque $vMarque et de couleur $vCouleur.";

    if(Session::is_admin()){
        echo	"(<a href=index.php?action=update&controller=voiture&immatriculation=$vImmatriculationURL >Mettre A Jour</a>)
                	(<a href=index.php?action=addpanier&controller=voiture&immatriculation=$vImmatriculationURL >Ajouter au Panier</a>)</p>";
    }

?>