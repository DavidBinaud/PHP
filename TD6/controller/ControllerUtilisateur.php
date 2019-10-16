<?php

	require_once (File::build_path(array("model","ModelUtilisateur.php")));
	class ControllerUtilisateur{

		public static function readAll(){
			$tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
			//require ('../view/voiture/list.php');  //redirige vers la vue
			//require (File::build_path(array("view","voiture","list.php")));
			$controller='utilisateur'; $view='list'; $pagetitle='Liste des utilisateurs';
			require (File::build_path(array("view","view.php")));
		}

	}
?>