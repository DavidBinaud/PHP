<?php

	//require_once ('../model/ModelVoiture.php'); // chargement du modèle
	require_once (File::build_path(array("model","ModelVoiture.php"))); // chargement du modèle
	Class ControllerVoiture{

		public static function readAll(){
			$tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
			//require ('../view/voiture/list.php');  //redirige vers la vue
			//require (File::build_path(array("view","voiture","list.php")));
			$controller='voiture'; $view='list'; $pagetitle='Liste des voitures';
			require (File::build_path(array("view","view.php")));
		}

		public static function read(){
			$v = ModelVoiture::getVoitureByImmat($_GET['immatriculation']);     //appel au modèle pour gerer la BD
			if($v == false){
				//require ('../view/voiture/error.php');  //redirige vers la vue d'erreur
				//require (File::build_path(array("view","voiture","error.php")));
				$controller='voiture'; $view='error'; $pagetitle='ErreurVoitByImmat';
				require (File::build_path(array("view","view.php")));
			}else
			{
				//require ('../view/voiture/detail.php');  //redirige vers la vue des détails de la voiture
				//require (File::build_path(array("view","voiture","detail.php")));
				$controller='voiture'; $view='detail'; $pagetitle='Detail Voiture';
				require (File::build_path(array("view","view.php")));
			}
		}



		public static function create(){
			//require ('../view/voiture/create.php');
			//require (File::build_path(array("view","voiture","create.php")));
			$controller='voiture'; $view='create'; $pagetitle='Creation Voiture';
			require (File::build_path(array("view","view.php")));
		}

		public static function created(){
			$v = new ModelVoiture($_GET['marque'],$_GET['couleur'],$_GET['immatriculation']);
			
			if(ModelVoiture::save($v) == false){
				//require ('../view/voiture/errorCreate.php');  //redirige vers la vue d'erreur
				//require (File::build_path(array("view","voiture","errorCreate.php")));
				$controller='voiture'; $view='errorCreate'; $pagetitle='Erreur de Création';
				require (File::build_path(array("view","view.php")));
			}else{
				$tab_v = ModelVoiture::getAllVoitures();
				$controller='voiture'; $view='created'; $pagetitle='Création Reussie';
				require (File::build_path(array("view","view.php")));
			}
			
		}


		public static function delete(){
			ModelVoiture::delete($_GET['immatriculation']);
			self::readAll();
		}


		public static function error(){
			$controller='voiture'; $view='error'; $pagetitle='Erreur Nom d\'action';
			require (File::build_path(array("view","view.php")));

		}
	}
?>