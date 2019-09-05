<?php


require_once('./voiture.php');

$voiture1 = new Voiture($_GET(marque),$_GET(couleur),$_GET(immatriculation));

$voiture1->afficher();





?>