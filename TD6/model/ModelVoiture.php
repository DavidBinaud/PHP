<?php
  //require_once ('./Model.php');
  require_once (File::build_path(array("model","Model.php")));
  class ModelVoiture extends Model{
     
    private $marque;
    private $couleur;
    private $immatriculation;
    protected static $object = "voiture";
    protected static $primary='immatriculation';
        
    //getter générique
    public function get($nom_attribut){
      return $this->$nom_attribut;
    }

    //setter générique
    public function set($nom_attribut,$value){
      if ($nom_attribut == immatriculation) {
        setImmatriculation2($value);
      }
      else{
      $this->$nom_attribut = $value;
      }
    }

    public function setImmatriculation($immatriculation2){
      if(strlen($immatriculation2) == 8){
        $this->immatriculation = $immatriculation2;
      }
    }
        
    // un constructeur
    // La syntaxe ... = NULL signifie que l'argument est optionel
    // Si un argument optionnel n'est pas fourni,
    //   alors il prend la valeur par défaut, NULL dans notre cas
    public function __construct($m = NULL, $c = NULL, $i = NULL)  {

      if (!is_null($m) && !is_null($c) && !is_null($i)) {
        // Si aucun de $m, $c et $i sont nuls,
        // c'est forcement qu'on les a fournis
        // donc on retombe sur le constructeur à 3 arguments
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
      }
    } 
             
    // une methode d'affichage.
    /*
    public function afficher() {
      echo "voiture " . $this->immatriculation . " de marque " . $this->marque . " (couleur " . $this->couleur . ")";
    }
    */



    public static function save($voiture){
      $sql = "INSERT INTO voiture (immatriculation,marque,couleur) VALUES (:immatriculation,:marque,:couleur)";

      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "immatriculation" => $voiture->immatriculation,
          "marque" => $voiture->marque,
          "couleur" => $voiture->couleur
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





    public static function update($data){
       $sql = "UPDATE voiture SET marque=:marque,couleur=:couleur WHERE immatriculation=:immatriculation";

        $req_prep = Model::$pdo->prepare($sql);
      
      //try{
        $req_prep->execute($data);




    }
  }
?>