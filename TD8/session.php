<?php
	//1.
	// On initialise la session
	session_start();

	//2.
	// On affecte des variables de sessions
	$_SESSION['login'] = 'remi';
	$_SESSION['age'] = 35;
	$_SESSION['adresse'] = array("Pays" => "France", "ville" => "Mtp","CP" => 34000,);

	//3.
	//On lit les variables de session
	foreach ($_SESSION as $key => $value) {
		if ($key != "adresse") {
			echo "<br>" . $key . ": " . $value;
		}else{
			//car adresse est aussi un array
			echo "<br>" . $key . ": <br>";
			foreach ($value as $key2 => $value2) {
				echo $key2 . ": " . $value2 . " ";
			}
		}
	}

	//4.
	//Supprimer une variable de session
	unset($_SESSION['age']);
	if (!isset($_SESSION['age'])) echo "<br>age non set";



	//5.
	//Supprimer completement une session
	session_unset();
	session_destroy();
	setcookie(session_name(),'',time()-1);


?>