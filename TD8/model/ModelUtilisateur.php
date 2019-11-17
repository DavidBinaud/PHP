<?php
  #liaison avec la classe Model
  require_once 'Model.php';
  class ModelUtilisateur extends Model{
     
    private $login;
    private $nom;
    private $prenom;
    private $mdp;
    private $admin;
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

    public function __construct($l = NULL, $n = NULL, $p = NULL,$password = NULL,$admin = 0)  {
      if (!is_null($l) && !is_null($n) && !is_null($p)) {
        $this->login = $l;
        $this->nom = $n;
        $this->prenom = $p;
        $this->mdp = $password;
        $this->admin = $admin;
      }
    }




    public function get_object_vars() {
        return get_object_vars($this);
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

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelTrajet');

        return $req_prep->fetchAll();


    }


    public static function deleteTrajet($id,$login){
      $sql = "DELETE FROM passager WHERE trajet_id =:trajetid AND utilisateur_login =:login";

        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "trajetid" => $id,
            "login" => $login
        );
    
        $req_prep->execute($values);
    }


    public static function checkPassword($login,$mot_de_passe_chiffre){
      $sql ="SELECT COUNT(*) FROM utilisateur WHERE login=:login AND mdp=:motdepasse";


      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
        'login' => $login,
        'motdepasse' => $mot_de_passe_chiffre
      );


      $req_prep->execute($values);

      $req_prep->setFetchMode(PDO::FETCH_ASSOC);

      $resultat = $req_prep->fetchAll();
      
      if($resultat[0]['COUNT(*)'] == '1'){
        return true;
      }
      return false;
    
    }



  }
?>