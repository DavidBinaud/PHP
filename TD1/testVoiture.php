<!DOCTYPE html>
<html>

    <head>
        <title> Test Voiture </title>
        <meta charset="utf-8" />
    </head>
   
    <body>
        <?php
        	require_once("./voiture.php");


        	$voiture1 = new Voiture("Audi","Rouge","679-DB-84");

        	$voiture1->afficher();
        ?>
    </body>
</html>