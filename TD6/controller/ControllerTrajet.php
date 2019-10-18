<?php

	require_once (File::build_path(array("model","ModelTrajet.php")));

	class ControllerTrajet{
		protected static $object = 'trajet';

		public static function readAll(){
			$tab_t = ModelTrajet::selectAll(); 

			$view='list'; $pagetitle='Liste des Trajets';
			require (File::build_path(array("view","view.php")));
		}


		public static function read(){
			$t = ModelTrajet::select($_GET['id']);     //appel au modèle pour gerer la BD
			if($t == false){
				//require ('../view/voiture/error.php');  //redirige vers la vue d'erreur
				//require (File::build_path(array("view","voiture","error.php")));
				$view='error'; $pagetitle='ErreurTrajetByID';
				require (File::build_path(array("view","view.php")));
			}else
			{
				//require ('../view/voiture/detail.php');  //redirige vers la vue des détails de la voiture
				//require (File::build_path(array("view","voiture","detail.php")));
				$view='detail'; $pagetitle='Detail Trajet';
				require (File::build_path(array("view","view.php")));
			}
		}



		public static function delete(){
			ModelTrajet::delete($_GET['id']);
			$tab_t = ModelTrajet::selectAll();
			$tid = $_GET['id'];

			$view='delete'; $pagetitle='Suppresion Trajet';
			require (File::build_path(array("view","view.php")));
		}

	}
?>