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

				$this->$id = $data['$id'];
				$this->$depart = $data['$depart'];
				$this->$arrivee = $data['$arrivee'];
				$this->$date = $data['$date'];
				$this->$nbplaces = $data['$nbplaces'];
				$this->$prix = $data['$prix'];
				$this->$conducteur_login = $data['$conducteur_login'];
			}
		}


		public function afficher(){
			echo "id: " . $this->id . " depart: " . $this->depart . " arrivee: " . $this->arrivee . " date: " . $this->date . " nbplaces: " . $this->nbplaces . " prix: " . $this->prix . " conducteur_login: " . $this->conducteur_login;
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


	}
?>