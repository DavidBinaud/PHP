<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail de la  voiture</title>
    </head>
    <body>
        <?php
            echo "voiture " . $v->getImmatriculation() . " de marque " . $v->getMarque() . " (couleur " . $v->getCouleur() . ")";
        ?>
    </body>
</html>