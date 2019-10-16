<?php

    $tId = htmlspecialchars($t->get('id'));
    $tIdURL = rawurlencode($t->get('id'));
    $tdepart = htmlspecialchars($t->get('depart'));
    $tarrivee = htmlspecialchars($t->get('arrivee'));
    $tdate = htmlspecialchars($t->get('date'));
    $tnbplaces = htmlspecialchars($t->get('nbplaces'));
    $tprix = htmlspecialchars($t->get('prix'));
    $tconducteur_login = htmlspecialchars($t->get('conducteur_login'));
    echo <<<EOT
        	<p> Trajet d'id $tId , au départ de $tdepart , à destination de $tarrivee , le $tdate , avec $tnbplaces places, au prix de $tprix € et le conducteur est $tconducteur_login.
        	(<a href=index.php?action=update&controller=trajet&id=$tIdURL >Mettre A Jour</a>)</p>
EOT;
?>
