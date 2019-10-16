<?php

	require_once (File::build_path(array("model","ModelTrajet.php")));

	class ControllerTrajet{

		public static function readAll(){
			$tab_t = ModelTrajet::selectAll(); 

			$controller='trajet'; $view='list'; $pagetitle='Liste des Trajets';
			require (File::build_path(array("view","view.php")));
		}

	}
?>