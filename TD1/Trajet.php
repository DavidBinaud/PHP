<?php
	class Trajet {

		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;

		//getter générique
		public function get($nom_attribut){
			return $this->$nom_attribut;
		}

		//setter générique
		public function get($nom_attribut,$value){
			$this->$nom_attribut = $value;
		}

		public function __construct($data){
			$this->$id = $data['$id'];
			$this->$depart = $data['$depart'];
			$this->$arrivee = $data['$arrivee'];
			$this->$date = $data['$date'];
			$this->$nbplaces = $data['$nbplaces'];
			$this->$prix = $data['$prix'];
			$this->$conducteur_login = $data['$conducteur_login'];
		}


	}
?>