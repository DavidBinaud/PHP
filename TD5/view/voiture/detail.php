<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail de la  voiture</title>
    </head>
    <body>
        <?php
            $vImmatriculation = htmlspecialchars($v->getImmatriculation());
            $vMarque = htmlspecialchars($v->getMarque());
            $vCouleur = htmlspecialchars($v->getCouleur());
             echo "voiture " . $vImmatriculation . " de marque " . $vMarque . " (couleur " . $vCouleur . ")";
        ?>
    </body>
</html>