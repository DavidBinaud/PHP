<?php

	require_once (File::build_path(array("model","ModelUtilisateur.php")));
	require_once (File::build_path(array("lib","Security.php")));
	require_once (File::build_path(array("lib","Session.php")));
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
			if (isset($_GET['login'],$_GET['nom'],$_GET['prenom'],$_GET['pass'],$_GET['passconfirm'],$_GET['email'])){
				if ($_GET['pass'] == $_GET['passconfirm']) {

					if (filter_var ($_GET['email'],FILTER_VALIDATE_EMAIL)) {
						$nonce = Security::generateRandomHex();
						$u = new ModelUtilisateur($_GET['login'],$_GET['nom'],$_GET['prenom'],Security::chiffrer($_GET['pass']),0,$nonce);
						
						if(ModelUtilisateur::save($u) == false){
							$view='errorCreate'; $pagetitle='Erreur de Création';
		
						}else{
							$login = rawurlencode($_GET['login']);
							$mail = "<a href=localhost/PHP/TD8/index.php?controller=utilisateur&action=validate&login=$login&nonce=$nonce>cliquer sur le lien pour valider l'adresse email</a>";
							var_dump($mail);
							mail($_GET['email'],"Le sujet",$mail);
							$tab_u = ModelUtilisateur::selectAll();
							$view='created'; $pagetitle='Création Reussie';
						}
					}else{
						$view='error'; $pagetitle='Erreur de Création'; $errorType="Created utilisateur: email non valide";
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
				if(Session::is_user($login) || Session::is_admin()){
					ModelUtilisateur::delete($login);
					$tab_u = ModelUtilisateur::selectAll();
					$view='delete'; $pagetitle='Suppresion utilisateur';
				}else{
					$view = 'connect'; $pagetitle = 'Connexion';
				}
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
					if (Session::is_user($_GET['login']) || Session::is_admin()) {
	    				$uLogin = htmlspecialchars($u->get('login'));
	    				$uNom = htmlspecialchars($u->get('nom'));
	    				$uPrenom = htmlspecialchars($u->get('prenom'));
	    				$uAction = "update";
						$view='update'; $pagetitle='Mise A Jour';
					}else{
						$view = 'connect'; $pagetitle = 'Connexion';
					}
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
					if(Session::is_user($_GET['login']) || Session::is_admin()){
						$data = array(
							"login" => $_GET['login'],
							"nom" => $_GET['nom'],
							"prenom" => $_GET['prenom'],
							"mdp" => Security::chiffrer($_GET['pass'])
						);
						if (isset($_GET['is_admin'])) {
							$data['admin'] = true;
						}else{
							$data['admin'] = false;
						}
						var_dump($data);

						ModelUtilisateur::update($data);

						$tab_u = ModelUtilisateur::selectAll();
						$view='updated'; $pagetitle='Mise A Jour';
					}else{
					$view = 'connect'; $pagetitle ='Connexion';
				}
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



		public static function connect(){
			$view='connect'; $pagetitle='Connexion';
			require (File::build_path(array("view","view.php")));
		}


		public static function connected(){
			if(isset($_GET['login'],$_GET['pass'])){
				if(ModelUtilisateur::checkPassword($_GET['login'],Security::chiffrer($_GET['pass']))){
					$u = ModelUtilisateur::select($_GET['login']);
					if ($u->get('nonce') == NULL) {
						$_SESSION['admin'] = $u->get('admin');
						$tab_t = ModelUtilisateur::findTrajets($_GET['login']);
						$_SESSION['login'] = $_GET['login'];

						$view='detail'; $pagetitle='Connexion';
					}else{
						$view='error'; $pagetitle='Erreur Connexion'; $errorType = 'Erreur connected: adresse email non validée';
					}
				}else{
					$view='error'; $pagetitle='Erreur Connexion'; $errorType = 'Erreur connected: Login et Mot de passe incorrect';
				}
			}
			require (File::build_path(array("view","view.php")));
		}


		public static function deconnect(){
			session_unset();
			session_destroy();
			setcookie(session_name(),'',-1);
			$pagetitle='Deconnection';
			header('Location: index.php');
			exit(); 
		}


		public static function validate(){
			if (isset($_GET['login'],$_GET['nonce'])) {
				$u = ModelUtilisateur::select($_GET['login']);
				if ($u != false) {
					if ($u->get('nonce') == $_GET['nonce']) {
						$data = $u->get_object_vars();
						var_dump($data);
						$data['nonce'] = NULL;
						var_dump($data);
						ModelUtilisateur::update($data);
						$view='validate'; $pagetitle='Validation Email';
					}else{
						$view='error'; $pagetitle='Erreur Connexion'; $errorType = 'Erreur validate: nonce non valide';
					}
				}else{
					$view='error'; $pagetitle='Erreur Connexion'; $errorType = 'Erreur validate: Login inexistant';
				}
			}else{
				$view='error'; $pagetitle='Erreur Connexion'; $errorType = 'Erreur validate: Probleme de paramètres';
			}
			require (File::build_path(array("view","view.php")));
		}




	}
?>