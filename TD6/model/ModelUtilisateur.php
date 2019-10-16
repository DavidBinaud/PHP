<?php
  #liaison avec la classe Model
  require_once 'Model.php';
  class ModelUtilisateur extends Model{
     
    private $login;
    private $nom;
    private $prenom;
    protected static $object = "utilisateur";
    protected static $primary='login';


    //getter générique
    public function get($nom_attribut){
      return $this->$nom_attribut;
    }

    //setter générique
    public function set($nom_attribut,$value){
      $this->$nom_attribut = $value;
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