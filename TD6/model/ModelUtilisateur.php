<?php
  #liaison avec la classe Model
  require_once 'Model.php';
  class ModelUtilisateur {
     
    private $login;
    private $nom;
    private $prenom;


    //Getters     
    public function getLogin() {
         return $this->login;  
    }

      public function getNom() {
         return $this->nom;  
    }

      public function getPrenom() {
         return $this->prenom;  
    }



    //Setters
    public function setLogin($login) {
         $this->marque = $login;
    }

      public function setNom($nom) {
         $this->marque = $nom;
    }

      public function setPrenom($prenom) {
         $this->marque = $prenom;
    }

    public function __construct($l = NULL, $n = NULL, $p = NULL)  {
      if (!is_null($l) && !is_null($n) && !is_null($p)) {
        $this->login = $l;
        $this->nom = $n;
        $this->prenom = $p;
      }
    }

    public function afficher(){
      echo "login: " . $this->login . " nom: " . $this->nom . " prenom: " . $this->prenom;
    }

    public static function getAllUtilisateurs(){
        #query est le mot clé pour requete(FR) c'est une fonction de la classe pdo qui est l'attribut contenu dans NOTRE classe Model
        # la variable rep se retrouve avec la réponse de la base de données mais non lisible en PHP
        $rep = Model::$pdo->query("SELECT * FROM utilisateur");

        #On précise le mode de récupération des données contenues dans la variable $rep, on les récupère en utilisant la classe Utilisateur qui va appeler son constructeur sur chaque "tuples" et créer un objet de la classe spécifiée pour chaque tuple
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');

        #on renvois le tableau d'objets utilisateur créés
        return  $rep->fetchAll();
    }

    public static function findTrajets($login){
      $sql = "SELECT T.*
              FROM trajet T
              JOIN passager P ON T.id=P.trajet_id
              WHERE P.utilisateur_login=:login";

      $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "login" => $login
        );
    
        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');

        return $req_prep->fetchAll();


    }


  }
?>