<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php

        foreach ($tab_v as $v){
            echo '<p> Voiture d\'immatriculation ' . "<a href=\"routeur.php?action=read&immatriculation=" . $v->getImmatriculation() . '">' . $v->getImmatriculation() ."</a> (" . "<a href=\"routeur.php?action=delete&immatriculation=" . $v->getImmatriculation() . '">' ."Supprimer</a>)</p>" ;
        }
        ?>
    </body>
</html>