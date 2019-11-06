<?php

	//1.
	//on créé un cookie
	setcookie ("TestCookie", "AlloCoco", time() +3600);

	//2.
	//On verifie que le cookie existe bien
	echo "boolean cookie:" . (isset($_COOKIE["TestCookie"]) && $_COOKIE["TestCookie"] == "AlloCoco");



	//3.
	// on affiche le contenue du cookie
	echo "<br>Valeur du cookie TestCookie:" . $_COOKIE["TestCookie"];












	echo "<br><br>Cookie sur Array<br>";
	//5.
	//creation array
	$array = array('Prenom' => 'Coco','Nom' => 'Sarlin','age' => '19');

	//serialization de l'array
	$serializedarray = serialize($array);

	//on envoie le cookie contenant l'array serialized
	setcookie ("TestCookieArray", "$serializedarray", time() +3600);
	$cookie = $_COOKIE["TestCookieArray"];

	//affichage de l'array serialized récupéré via le cookie
	echo "seralized: " . $cookie;

	//var dump du cookie unserialized, c'est bien un array
	echo "<br>Var dump: ";
	var_dump(unserialize($cookie));
	$cookie = unserialize($cookie);

	//pour chaque clé du cookie, on va afficher sa valeur
	foreach ($cookie as $key => $value) {
		echo "<br>" . $key . ":" . $value;
	}

?>