<?php

	require_once (File::build_path(array("model","ModelVoiture.php"))); // chargement du modèle
	Class ControllerVoiture{
		protected static $object = 'voiture';



		public static function readAll(){
			$tab_v = ModelVoiture::selectAll();
			$view='list'; $pagetitle='Liste des voitures';
			require (File::build_path(array("view","view.php")));
		}




		public static function read(){
			$v = ModelVoiture::select($_GET['immatriculation']);
			if($v == false){
				$view='error'; $pagetitle='ErreurVoitByImmat';
				require (File::build_path(array("view","view.php")));
			}else
			{
				$view='detail'; $pagetitle='Detail Voiture';
				require (File::build_path(array("view","view.php")));
			}
		}







		public static function create(){
    		$vImmatriculation = "\"\"";
    		$vMarque = "\"\"";
    		$vCouleur = "\"\"";
    		$vAction = "create";
		
			$view='update'; $pagetitle='Creation Voiture';
			require (File::build_path(array("view","view.php")));
		}






		public static function created(){
			$v = new ModelVoiture($_GET['marque'],$_GET['couleur'],$_GET['immatriculation']);
			var_dump(get_object_vars($v));
			if(ModelVoiture::save($v) == false){
				$view='errorCreate'; $pagetitle='Erreur de Création';
				require (File::build_path(array("view","view.php")));
			}else{
				$tab_v = ModelVoiture::selectAll();
				$view='created'; $pagetitle='Création Reussie';
				require (File::build_path(array("view","view.php")));
			}
			
		}









		public static function delete(){
			ModelVoiture::delete($_GET['immatriculation']);
			$tab_v = ModelVoiture::selectAll();
			$immat = $_GET['immatriculation'];

			$view='delete'; $pagetitle='Suppresion Voiture';
			require (File::build_path(array("view","view.php")));
		}







		public static function error(){
			$view='error'; $pagetitle='Erreur Nom d\'action';
			require (File::build_path(array("view","view.php")));

		}










		public static function update(){
			if(isset($_GET['immatriculation'])){
				$v = ModelVoiture::select($_GET['immatriculation']);

				if($v == false){
					self::error();
				}
				else{

    				$vImmatriculation = htmlspecialchars($v->get('immatriculation'));
    				$vMarque = htmlspecialchars($v->get('marque'));
    				$vCouleur = htmlspecialchars($v->get('couleur'));
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
			if(isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])){
				$data = array(
					"immatriculation" => $_GET['immatriculation'],
					"marque" => $_GET['marque'],
					"couleur" => $_GET['couleur']
				);

				ModelVoiture::update($data);

				$tab_v = ModelVoiture::selectAll();
				$view='updated'; $pagetitle='Mise A Jour';
				require (File::build_path(array("view","view.php")));
			}
			else{
				self::error();
			}
		}


		public static function addpanier(){
			if(isset($_GET['immatriculation'])){
				$v = ModelVoiture::select($_GET['immatriculation']);
				if ($v == true) {
					if(isset($_COOKIE) && isset($_COOKIE['panier'])){
						$panier = unserialize($_COOKIE['panier']);
						$immat = $_GET['immatriculation'];

						// foreach ($panier as $lignepanier) {
						// 	if($lignepanier['immatriculation'] == $immat){
						// 		$lignepanier['qté']++;
						// 	}
						// }

						$index = array_search($immat, array_column($panier, 'immatriculation'));

						//on doit faire une comparaison stricte dans le cas ou l'index 0 serait celui trouvé car 0 != false renvoie false
						if($index !== false){
							$panier[$index]['quantité'] = $panier[$index]['quantité'] + 1;
						}else{
							$panier[] = array('immatriculation' => $v->get('immatriculation'), 'quantité' => 1);
						}
						

						setcookie ("panier", serialize($panier), time() +3600);
					}else{
						$toCookie = array( 0 => array('immatriculation' => $v->get('immatriculation'), 'quantité' => 1));
						setcookie ("panier", serialize($toCookie), time() +3600);
					}
					
					$view='addedpanier'; $pagetitle='Ajouté au panier';
				}else{
					$view='error'; $pagetitle='Erreur';$errorType = 'add panier, id produit inexistant';
				}
			}else{
				$view='error'; $pagetitle='Erreur';$errorType = 'add panier, probleme parametre';
			}
			require (File::build_path(array("view","view.php")));
		}

		public static function getpanier(){
			$view='panier'; $pagetitle='panier';
			require (File::build_path(array("view","view.php")));
		}
		
	}
?>