<?php

	require_once (File::build_path(array("model","ModelTrajet.php")));

	class ControllerTrajet{
		protected static $object = 'trajet';


		public static function error(){
			$view='error'; $pagetitle='Erreur Nom d\'action';
			require (File::build_path(array("view","view.php")));

		}




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





		public static function create(){
    		$tid = "\"\"";
			$tdepart = "\"\"";
			$tarrivee = "\"\"";
			$tdate = "\"\"";
			$tnbplaces = "\"\"";
			$tprix = "\"\"";
			$tconducteur_login = "\"\"";
    		$tAction = "create";
		
			$view='update'; $pagetitle='Creation Trajet';
			require (File::build_path(array("view","view.php")));
		}






		public static function created(){
			if (isset($_GET['id']) && isset($_GET['depart']) && isset($_GET['arrivee']) && isset($_GET['date']) && isset($_GET['nbplaces']) && isset($_GET['prix']) && isset($_GET['conducteur_login'])) {

				$data = array(
					'id' => $_GET['id'], 
					'depart' => $_GET['depart'], 
					'arrivee' => $_GET['arrivee'], 
					'date' => $_GET['date'], 
					'nbplaces' => $_GET['nbplaces'], 
					'prix' => $_GET['prix'], 
					'conducteur_login' => $_GET['conducteur_login'],
				);

					$t = new ModelTrajet($data);


					if(ModelTrajet::save($t) == false){
						$view='errorCreate'; $pagetitle='Erreur de Création';
						require (File::build_path(array("view","view.php")));
					}else{
						$tab_t = ModelTrajet::selectAll();
						$view='created'; $pagetitle='Création Reussie';
						require (File::build_path(array("view","view.php")));
					}
			}else{
				$view='errorCreate'; $pagetitle='Erreur de Création';
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







		public static function update(){
			if(isset($_GET['id'])){
				$t = ModelTrajet::select($_GET['id']);

				if($t == false){
					self::error();
				}
				else{

    				$tid = htmlspecialchars($t->get('id'));
					$tdepart = htmlspecialchars($t->get('depart'));
					$tarrivee = htmlspecialchars($t->get('arrivee'));
					$tdate = htmlspecialchars($t->get('date'));
					$tnbplaces = htmlspecialchars($t->get('nbplaces'));
					$tprix = htmlspecialchars($t->get('prix'));
					$tconducteur_login = htmlspecialchars($t->get('conducteur_login'));



    				$vAction = "update";

					$view='update'; $pagetitle='Mise A Jour';
					require (File::build_path(array("view","view.php")));
				}
			}
			else{
				self::error();
			}
		}









		public static function updated(){
			if (isset($_GET['id']) && isset($_GET['depart']) && isset($_GET['arrivee']) && isset($_GET['date']) && isset($_GET['nbplaces']) && isset($_GET['prix']) && isset($_GET['conducteur_login'])) {

				$data = array(
					'id' => $_GET['id'], 
					'depart' => $_GET['depart'], 
					'arrivee' => $_GET['arrivee'], 
					'date' => $_GET['date'], 
					'nbplaces' => $_GET['nbplaces'], 
					'prix' => $_GET['prix'], 
					'conducteur_login' => $_GET['conducteur_login'],
				);

				ModelTrajet::update($data);

				$tab_t = ModelTrajet::selectAll();
				$view='updated'; $pagetitle='Mise A Jour';
				require (File::build_path(array("view","view.php")));
			}
			else{
				self::error();
			}
		}

	}
?>