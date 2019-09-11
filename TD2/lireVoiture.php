<?php

	#necessaire exo 6-7 require_once "./Model.php";
	require_once "./Voiture.php";


	#EX6
	#$rep = Model::$pdo->query("SELECT * FROM voiture");
	#tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);
	#
	#
	#foreach ($tab_obj as $key => $obj) {
	#	echo "<p>immatriculation: " . $obj->immatriculation . " marque: " . $obj->marque . " couleur: " . $obj->couleur . "</p>";
	#}

	#EX7
	#$rep = Model::$pdo->query("SELECT * FROM voiture");
	#$rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
	#$tab_voit = $rep->fetchAll();

	#foreach ($tab_voit as $key => $voiture) {
	#	echo "<p>";
	#	$voiture->afficher();
	#	echo "</p>";
	#}


	#EX8
	$tab_voit = Voiture::getAllVoitures();

	foreach ($tab_voit as $key => $voiture) {
		echo "<p>" . $voiture->afficher() . "</p>";
	}


?>