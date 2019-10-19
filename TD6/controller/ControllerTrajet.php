<?php

	require_once (File::build_path(array("model","ModelTrajet.php")));
	require_once (File::build_path(array("model","ModelUtilisateur.php")));

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
			if(isset($_GET['id'])){
				$t = ModelTrajet::select($_GET['id']);     //appel au modèle pour gerer la BD
				if($t == false){
					
					$view='error'; $pagetitle='ErreurTrajetByID';
					require (File::build_path(array("view","view.php")));
				}else
				{
					$tab_u = $t->findPassagers($_GET['id']);
					$view='detail'; $pagetitle='Detail Trajet';
					require (File::build_path(array("view","view.php")));
				}
			}else{
				$view='error'; $pagetitle='ErreurTrajetByID'; $errorType = "Read d'un Trajet; Pas d'id fourni";
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









		public static function readPassagerOfTrajet(){
			if(isset($_GET['id'])){
				$tab_u = ModelTrajet::findPassagers($_GET['id']);
				$t = ModelTrajet::select($_GET['id']);

				$view='userOfTrajet'; $pagetitle='Passagers du Trajet';
				require (File::build_path(array("view","view.php")));

			}else{
				$errorType = "Trouver Les Passagers d'un Trajet: Pas d'id Fourni";
				$view='error'; $pagetitle='Erreur Parametre';
				require (File::build_path(array("view","view.php")));
			}

		}




		public static function deletePassagerFromTrajet(){
			if(isset($_GET['id']) && isset($_GET['loginPassager'])){
				ModelTrajet::deletePassagers($_GET['id'],$_GET['loginPassager']);
				$tab_u = ModelTrajet::findPassagers($_GET['id']);
				$t = ModelTrajet::select($_GET['id']);

				$view='deleteUserOfTrajet'; $pagetitle='Deletion ; Passagers du Trajet';
				require (File::build_path(array("view","view.php")));

			}else{
				$errorType = "Trouver Les Passagers d'un Trajet: Pas d'id Fourni";
				$view='error'; $pagetitle='Erreur Parametre';
				require (File::build_path(array("view","view.php")));
			}
		}


		public static function addPassagerToTrajet(){
			if (isset($_GET['id'])) {
				$t = ModelTrajet::select($_GET['id']);

				if ($t == false) {
					$errorType = "Ajouter un Passagers à un Trajet: L'id Fourni est invalide";
					$view='error'; $pagetitle='Erreur Parametre';
					require (File::build_path(array("view","view.php")));

				}else{
					$tid = htmlspecialchars($_GET['id']);
					$tab_Allu = ModelUtilisateur::selectAll();

					$view='ajoutPassager'; $pagetitle='Ajout Passager';
					require (File::build_path(array("view","view.php")));
				}
			}
			else{
				$errorType = "Ajouter un Passagers à un Trajet: Pas d'id Fourni";
				$view='error'; $pagetitle='Erreur Parametre';
				require (File::build_path(array("view","view.php")));
			}
		}


		public static function addedPassagerToTrajet(){
			//On teste si les parametres sont bien passés par le get
			if (isset($_GET['id']) && isset($_GET['loginPassager'])) {
				$t = ModelTrajet::select($_GET['id']);
				// on vérifie que le trajet d'id donné existe
				if ($t != false){
					$tab_u = ModelTrajet::findPassagers($_GET['id']);
					//on vérifie qu'il reste des places sur le trajet
					if (count($tab_u) < $t->get('nbplaces')) {
						//on vérifie que le login du passager à ajouter soit différent du login conducteur
						if ($_GET['loginPassager'] != $t->get('conducteur_login')) {
							//on teste si l'ajout est réussi
							if (ModelTrajet::addPassager($_GET['id'],$_GET['loginPassager'])) {
								$t = ModelTrajet::select($_GET['id']);
								$tab_u = ModelTrajet::findPassagers($_GET['id']);

								$view='PassagerAjouté'; $pagetitle='Ajout Passager Reussie';
								require (File::build_path(array("view","view.php")));
							}else{
								$errorType = "Ajouter un Passagers à un Trajet: Le passager existe déjà sur ce trajet";
								$view='error'; $pagetitle='Erreur Parametre';
								require (File::build_path(array("view","view.php")));
							}
						}
						else{
							$errorType = "Ajouter un Passagers à un Trajet: Le conducteur ne peut pas être son propre passager";
							$view='error'; $pagetitle='Erreur Parametre';
							require (File::build_path(array("view","view.php")));
						}
					}
					else{
						$errorType = "Ajouter un Passagers à un Trajet: Le Trajet est déjà complet";
						$view='error'; $pagetitle='Erreur Parametre';
						require (File::build_path(array("view","view.php")));
					}
				}
				else{
					$errorType = "Ajouter un Passagers à un Trajet: L'id Fourni n'existe pas";
					$view='error'; $pagetitle='Erreur Parametre';
						require (File::build_path(array("view","view.php")));
				}
			}
			else{
				$errorType = "Ajouter un Passagers à un Trajet: Probleme de parametre";
				$view='error'; $pagetitle='Erreur Parametre';
				require (File::build_path(array("view","view.php")));
			}
		}

	}
?>