<?php

	require_once (File::build_path(array("model","ModelUtilisateur.php")));
	class ControllerUtilisateur{
		protected static $object = 'utilisateur';

		public static function readAll(){
			$tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
			//require ('../view/voiture/list.php');  //redirige vers la vue
			//require (File::build_path(array("view","voiture","list.php")));
			$view='list'; $pagetitle='Liste des utilisateurs';
			require (File::build_path(array("view","view.php")));
		}


		public static function read(){
			if (isset($_GET['login'])) {
			
				$u = ModelUtilisateur::select($_GET['login']); 
				if($u == false){
					//require ('../view/voiture/error.php');  //redirige vers la vue d'erreur
					//require (File::build_path(array("view","voiture","error.php")));
					$view='error'; $pagetitle='ErreurUserByID';
					require (File::build_path(array("view","view.php")));
				}else
				{
					//require ('../view/voiture/detail.php');  //redirige vers la vue des détails de la voiture
					//require (File::build_path(array("view","voiture","detail.php")));
					$view='detail'; $pagetitle='Detail utilisateur';
					require (File::build_path(array("view","view.php")));
				}
			}else{
				$view='error'; $pagetitle='ErreurUserByID';
				require (File::build_path(array("view","view.php")));
			}
		}




		public static function create(){
    		$uLogin = "\"\"";
    		$uNom = "\"\"";
    		$uPrenom = "\"\"";
    		$uAction = "create";
		
			$view='update'; $pagetitle='Creation Utilisateur';
			require (File::build_path(array("view","view.php")));
		}






		public static function created(){
			if (isset($_GET['login']) & isset($_GET['nom']) & isset($_GET['prenom'])){
				
				$u = new ModelUtilisateur($_GET['login'],$_GET['nom'],$_GET['prenom']);
				
				if(ModelUtilisateur::save($u) == false){
					$view='errorCreate'; $pagetitle='Erreur de Création';
					require (File::build_path(array("view","view.php")));
				}else{
					$tab_u = ModelUtilisateur::selectAll();
					$view='created'; $pagetitle='Création Reussie';
					require (File::build_path(array("view","view.php")));
				}

			}else{
				$view='errorCreate'; $pagetitle='Erreur de Création';
				require (File::build_path(array("view","view.php")));
			}
			
		}















		public static function delete(){
			ModelUtilisateur::delete($_GET['login']);
			$tab_u = ModelUtilisateur::selectAll();
			$login = $_GET['login'];

			$view='delete'; $pagetitle='Suppresion utilisateur';
			require (File::build_path(array("view","view.php")));
		}







		public static function update(){
			if(isset($_GET['login'])){
				$u = ModelUtilisateur::select($_GET['login']);

				if($u == false){
					self::error();
				}
				else{

    				$uLogin = htmlspecialchars($u->get('login'));
    				$uNom = htmlspecialchars($u->get('nom'));
    				$uPrenom = htmlspecialchars($u->get('prenom'));
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
			if(isset($_GET['login']) && isset($_GET['nom']) && isset($_GET['prenom'])){
				$data = array(
					"login" => $_GET['login'],
					"nom" => $_GET['nom'],
					"prenom" => $_GET['prenom']
				);

				ModelUtilisateur::update($data);

				$tab_u = ModelUtilisateur::selectAll();
				$view='updated'; $pagetitle='Mise A Jour';
				require (File::build_path(array("view","view.php")));
			}
			else{
				self::error();
			}
		}




		public static function error(){
			if (!isset($errorType)) {
				$errorType = "Inconnue";
			}
			$view='error'; $pagetitle='Erreur Nom d\'action';
			require (File::build_path(array("view","view.php")));

		}



		public static function readTrajetOfUser(){
			if(isset($_GET['login'])){
				$tab_t = ModelUtilisateur::findTrajets($_GET['login']);
				$u = ModelUtilisateur::select($_GET['login']);

				$view='trajetUser'; $pagetitle='Trajet de l\'utilisateur';
				require (File::build_path(array("view","view.php")));

			}else{
				$errorType = "Trouver Les Trajets d'un utilisateur: Pas de login Fourni";
				$view='error'; $pagetitle='Erreur Lecture';
				require (File::build_path(array("view","view.php")));
			}

		}



	}
?>