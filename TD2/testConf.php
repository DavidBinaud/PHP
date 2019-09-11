<!DOCTYPE html>
	<html>
	    <head>
	        <meta charset="utf-8" />
	        <title> Test Conf </title>
	    </head>
	   
	    <body>

			<?php
			  // On inclut les fichiers de classe PHP avec require_once
			  // pour éviter qu'ils soient inclus plusieurs fois
			  require_once 'Conf.php';

			  // On affiche le login de la base de donnees
			  
			  echo "<p>hostname: " . Conf::getHostname() . "<br>database: " . Conf::getDatabase() . "<br>login: " . Conf::getLogin() . "<br>password: " . Conf::getPassword() . "</p>";
			?>

		</body>
	</html>