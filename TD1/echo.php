<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> My first PHP </title>
    </head>
   
    <body>
        Here is the output of the PHP script :<br>
        <?php
          
        $voiture['marque'] = "Audi";
        $voiture['couleur'] = "rouge";
        $voiture['immatriculation'] = "679-DB-13";

        /*
        ou
          $voiture = array(
          'marque' => 'Audi',
          'couleur' => 'rouge',
          'immatriculation' => "679-DB-13");

        */

        echo "<p>voiture " . $voiture['immatriculation'] . " de marque " . $voiture['marque'] . " (couleur " . $voiture['couleur'] . ")</p>";


        $voiture1 = array(
          'marque' => 'Fiat',
          'couleur' => 'jaunepoussin',
          'immatriculation' => 'BONOBO-30');

         $voiture2 = array(
          'marque' => 'Lambo',
          'couleur' => 'Blanc-Bleu',
          'immatriculation' => 'TracteurTom');

        $voitures = array(
          1       => $voiture,
          2       => $voiture1,
          3       => $voiture2);
        
        //var_dump($voitures);


        if(empty($voitures)){
          echo "<p>il n'y a aucune voitures</p>";
        }else{
          echo "<h2>Liste des voitures :</h2>\n <ul>";
          foreach ($voitures as $key => $voiture) {
            echo "<li>voiture " . $voiture['immatriculation'] . " de marque " . $voiture['marque'] . " (couleur " . $voiture['couleur'] . ")</li>";
          }
          echo "</ul>";


        }

        ?>



    </body>
</html> 