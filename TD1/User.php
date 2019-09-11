<?php
class User {
   
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

  public function __construct($l, $n, $p)  {
   $this->login = $l;
   $this->nom = $n;
   $this->prenom = $p;
  } 


}
?>