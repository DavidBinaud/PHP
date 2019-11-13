<?php

	require_once (File::build_path(array("model","ModelUtilisateur.php")));
	class ControllerUtilisateur{
		protected static $object = 'utilisateur';

		public static function readAll(){
			$tab_u = ModelUtilisateur::selectAll();

			$view='list'; $pagetitle='Liste des utilisateurs';
			require (File::build_path(array("view","view.php")));
		}


		public static function read(){
			if (isset($_GET['login'])) {
			
				$u = ModelUtilisateur::select($_GET['login']); 
				if($u == false){
					$view='error'; $pagetitle='ErreurUserByID';
				}else
				{
					$tab_t = ModelUtilisateur::findTrajets($_GET['login']);
					$view='detail'; $pagetitle='Detail utilisateur';
				}
			}else{
				$view='error'; $pagetitle='ErreurUserByID'; $errorType = 'Read Utilisateur: Pas de login fourni';
			}
			require (File::build_path(array("view","view.php")));
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
			if (isset($_GET['login'],$_GET['nom'],$_GET['prenom'],$_GET['pass'],$_GET['passconfirm'])){
				if ($_GET['pass'] == $_GET['passconfirm']) {
						
					$u = new ModelUtilisateur($_GET['login'],$_GET['nom'],$_GET['prenom'],$_GET['pass']);
					
					if(ModelUtilisateur::save($u) == false){
						$view='errorCreate'; $pagetitle='Erreur de Création';
	
					}else{
						$tab_u = ModelUtilisateur::selectAll();
						$view='created'; $pagetitle='Création Reussie';
	
					}
				}else{
					$view='error'; $pagetitle='Erreur de Création'; $errorType="Created utilisateur: mots de passe sont différents";
				}

			}else{
				$view='error'; $pagetitle='Erreur de Création'; $errorType="Created utilisateur: probleme de paramètres";
			}
			require (File::build_path(array("view","view.php")));
			
		}















		public static function delete(){
			if (isset($_GET['login'])) {
				$login = $_GET['login'];
				ModelUtilisateur::delete($login);
				$tab_u = ModelUtilisateur::selectAll();
				$view='delete'; $pagetitle='Suppresion utilisateur';
			}
			else{
				$view = 'error'; $pagetitle ='ErreurUserDelete'; $errorType = 'Delete Utilisateur: Pas de Login fourni';
			}
			require (File::build_path(array("view","view.php")));
		}







		public static function update(){
			if(isset($_GET['login'])){
				$u = ModelUtilisateur::select($_GET['login']);

				if($u == false){
					$view = 'error'; $pagetitle ='ErreurUserDelete'; $errorType = 'Update Utilisateur: Login fourni inexistant';
				}
				else{

    				$uLogin = htmlspecialchars($u->get('login'));
    				$uNom = htmlspecialchars($u->get('nom'));
    				$uPrenom = htmlspecialchars($u->get('prenom'));
    				$uAction = "update";
					$view='update'; $pagetitle='Mise A Jour';
				}
			}
			else{
				$view = 'error'; $pagetitle ='ErreurUserUpdate'; $errorType = 'Update Utilisateur: Pas de Login fourni';
			}
			require (File::build_path(array("view","view.php")));
		}





		public static function updated(){
			if(isset($_GET['login'],$_GET['nom'],$_GET['prenom'],$_GET['pass'])){
				if ($_GET['pass'] == $_GET['passconfirm']) {
					$data = array(
						"login" => $_GET['login'],
						"nom" => $_GET['nom'],
						"prenom" => $_GET['prenom'],
						"mdp" => $_GET['pass']
					);

					ModelUtilisateur::update($data);

					$tab_u = ModelUtilisateur::selectAll();
					$view='updated'; $pagetitle='Mise A Jour';
				}else{
					$view = 'error'; $pagetitle ='ErreurUserUpdated'; $errorType = 'Updated Utilisateur: mots de passe sont différents';
				}
			}
			else{
				$view = 'error'; $pagetitle ='ErreurUserUpdated'; $errorType = 'Updated Utilisateur: Probleme de paramètres';
			}
			require (File::build_path(array("view","view.php")));
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

			}else{
				$errorType = "Trouver Les Trajets d'un utilisateur: Pas de login Fourni";
				$view='error'; $pagetitle='Erreur Lecture';
			}
			require (File::build_path(array("view","view.php")));

		}





		public static function deleteTrajetFromUser(){
			if (isset($_GET['login'],$_GET['idTrajet'])) {
				ModelUtilisateur::deleteTrajet($_GET['idTrajet'],$_GET['login']);
				$tab_t = ModelUtilisateur::findTrajets($_GET['login']);
				$u = ModelUtilisateur::select($_GET['login']);

				$view='deleteTrajetFromUser'; $pagetitle='Deletion ; Passagers du Trajet';
				
			}
			else{
				$errorType = "Supprimer la participation d'un utilisateur à un Trajet en tant que passager: problème de paramètres";
				$view='error'; $pagetitle='Erreur deleteTrajetFromUser';
			}
			require (File::build_path(array("view","view.php")));
		}


	}
?>