<?php
require_once ('Model.php');
class ModelVoiture {
   
  private $marque;
  private $couleur;
  private $immatriculation;
      
  // un getter      
  public function getMarque() {
       return $this->marque;  
  }

  public function getCouleur(){
      return $this->couleur;
  }

  public function getImmatriculation(){
      return $this->immatriculation;
  }
     
  // un setter 
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }

  public function setCouleur($couleur2){
      $this->couleur = $couleur2;
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

  //Ajout pour l'exo 8
  public static function getAllVoitures(){

    $rep = Model::$pdo->query("SELECT * FROM voiture");

    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');

    return  $rep->fetchAll();
  }


  public static function getVoitureByImmat($immat) {
    $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom_tag" => $immat,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête   
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
  }

  public static function save($voiture){
    $sql = "INSERT INTO voiture (immatriculation,marque,couleur) VALUES (:immatriculation,:marque,:couleur)";

    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "immatriculation" => $voiture->immatriculation,
        "marque" => $voiture->marque,
        "couleur" => $voiture->couleur
    );
    
    $req_prep->execute($values);

  }


}
?>