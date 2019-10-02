<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php

        foreach ($tab_v as $v){
            $vImmatriculation = htmlspecialchars($v->getImmatriculation());
            echo '<p> Voiture d\'immatriculation ' . "<a href=\"index.php?action=read&immatriculation=" . $vImmatriculation . '">' . $vImmatriculation ."</a> (" . "<a href=\"index.php?action=delete&immatriculation=" . $vImmatriculation . '">' ."Supprimer</a>)</p>" ;
        }
        ?>
    </body>
</html>