<?php
	require_once (File::build_path(array("model","Model.php")));
	require_once (File::build_path(array("model","ModelUtilisateur.php")));
	class ModelTrajet extends Model{

		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;
		protected static $object = "trajet";
		protected static $primary='id';

		//getter générique
		public function get($nom_attribut){
			return $this->$nom_attribut;
		}

		//setter générique
		public function set($nom_attribut,$value){
			$this->$nom_attribut = $value;
		}

		public function __construct($data = NULL){
			if (!is_null($data['id']) && !is_null($data['depart']) && !is_null($data['arrivee'] && !is_null($data['date']) && !is_null($data['nbplaces'])) && !is_null($data['prix']) && !is_null($data['conducteur_login'])) {

				$this->id = $data['id'];
				$this->depart = $data['depart'];
				$this->arrivee = $data['arrivee'];
				$this->date = $data['date'];
				$this->nbplaces = $data['nbplaces'];
				$this->prix = $data['prix'];
				$this->conducteur_login = $data['conducteur_login'];
			}
		}


		public function get_object_vars() {
       		return get_object_vars($this);
    	}



		public static function findPassagers($id){
			$sql = 
			"SELECT u.login,u.nom,u.prenom
			FROM passager p
			JOIN utilisateur u ON p.utilisateur_login =u.login
			WHERE p.trajet_id =:trajetid
			";

    		$req_prep = Model::$pdo->prepare($sql);

		    $values = array(
		        "trajetid" => $id
		    );
    
    		$req_prep->execute($values);

    		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');

    		#on renvois le tableau d'objets trajet créés
    		return  $req_prep->fetchAll();

		}







		public static function deletePassagers($id,$login_passager){
			$sql = "DELETE FROM passager WHERE trajet_id =:trajetid AND utilisateur_login =:passager";

    		$req_prep = Model::$pdo->prepare($sql);

		    $values = array(
		        "trajetid" => $id,
		        "passager" => $login_passager
		    );
    
    		$req_prep->execute($values);
		}



		public static function addPassager($id,$login_passager){
      		$sql = "INSERT INTO passager (trajet_id,utilisateur_login) VALUES (:id,:loginPassager)";
		    $req_prep = Model::$pdo->prepare($sql);
			
			$values = array(
				"id" => $id,
				"loginPassager" => $login_passager
			);
	      	
	      	
	      	try{
	      	  $req_prep->execute($values);
	      	} catch(PDOException $e) {
	      	    if($e->getCode() == 23000){
	      	    	return false;
	      	    }
		    }
      		return true;

		}


	}
?>