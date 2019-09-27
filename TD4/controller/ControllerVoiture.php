<?php
	require_once ('../model/ModelVoiture.php'); // chargement du modèle
	Class ControllerVoiture{

		public static function readAll(){
			$tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
			require ('../view/voiture/list.php');  //redirige vers la vue
		}

		public static function read(){
			$v = ModelVoiture::getVoitureByImmat($_GET['immatriculation']);     //appel au modèle pour gerer la BD
			if($v == false){
				require ('../view/voiture/error.php');  //redirige vers la vue d'erreur
			}else
			{
				require ('../view/voiture/detail.php');  //redirige vers la vue des détails de la voiture
			}
		}



		public static function create(){
			require ('../view/voiture/create.php');
		}

		public static function created(){
			$v = new ModelVoiture($_GET['marque'],$_GET['couleur'],$_GET['immatriculation']);
			
			if(ModelVoiture::save($v) == false){
				require ('../view/voiture/errorCreate.php');  //redirige vers la vue d'erreur
			}else{
				self::readAll();
			}
			
		}


		public static function delete(){
			ModelVoiture::delete($_GET['immatriculation']);
			self::readAll();
		}
	}
?>