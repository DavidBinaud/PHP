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


		public static function read(){
			$u = ModelUtilisateur::select($_GET['login']);     //appel au modèle pour gerer la BD
			if($u == false){
				//require ('../view/voiture/error.php');  //redirige vers la vue d'erreur
				//require (File::build_path(array("view","voiture","error.php")));
				$controller='utilisateur'; $view='error'; $pagetitle='ErreurUserByID';
				require (File::build_path(array("view","view.php")));
			}else
			{
				//require ('../view/voiture/detail.php');  //redirige vers la vue des détails de la voiture
				//require (File::build_path(array("view","voiture","detail.php")));
				$controller='utilisateur'; $view='detail'; $pagetitle='Detail utilisateur';
				require (File::build_path(array("view","view.php")));
			}
		}

	}
?>