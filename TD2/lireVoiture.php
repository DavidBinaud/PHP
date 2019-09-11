<?php

	require_once "./Model.php";

	$rep = Model::$pdo->query("SELECT * FROM voiture");

	$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);


	foreach ($tab_obj as $key => $obj) {
		echo "<p>immatriculation: " . $obj->immatriculation . " marque: " . $obj->marque . " couleur: " . $obj->couleur . "</p>";
	}

?>