<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php

        foreach ($tab_v as $v)
            echo '<p> Voiture d\'immatriculation ' . "<a href=\"http://webinfo/~binaudd/PHP/TD4/controller/routeur.php?action=read&immatriculation=" . $v->getImmatriculation() . '">' . $v->getImmatriculation() .'</a></p>';
        ?>
    </body>
</html>