<?php

class User {
  private $_id;
  private $_nom;
  private $_prenom;
  private $_mail;
  private $_phone;
  private $_adressePost;

  /**
   * Création d'un nouvel utilisateur
   * @param string $nom      Le nom de l'utilisateur
   * @param string $prenom   Le prénom de l'utilisateur
   * @param string $mail     Le mail de l'utilisateur
   * @param int $phone   Le numéro de tel de l'utilisateur
   * @param string $adressePost  L'adresse postale de l'utilisateur
   * @param int $id       L'id de l'utilisateur si on le connait, sinon rien.
   */
  function __construct(string $nom, string $prenom,string $mail, string $phone, string $adressePost, int|string $id = "à créer"){
    $this->setId($id);
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setMail($mail);
    $this->setPhone($phone);
    $this->setAdressePost($adressePost);
  }

  public function getId(): int {
    return $this->_id;
  }
  public function setId(int|string $id){
    if (is_string($id) && $id === "à créer") {
      $this->_id = $this->CreerNouvelId();
    }else {
      $this->_id = $id;
    }

  }
  public function getNom(): string {
    return $this->_nom;
  }
  public function setNom(string $nom){
    $this->_nom = $nom;
  }
  public function getPrenom(): string {
    return $this->_prenom;
  }
  public function setPrenom(string $prenom){
    $this->_prenom = $prenom;
  }
  public function getMail(): string {
    return $this->_mail;
  }
  public function setMail(string $mail){
    $this->_mail = $mail;
  }
  public function getAdressePost(): string {
    return $this->_adressePost;
  }
  public function setAdressePost(string $adressePost){
    $this->_adressePost = $adressePost;
  }

  public function getPhone(): string {
    return $this->_phone;
  }
  public function setPhone(string $phone) {
    $this->_phone = $phone;
  }

  // public function isAdmin() {
  //   if ($this->getRole() == "admin") {
  //     return true;
  //   }else {
  //     return false;
  //   }
  // }

  private function CreerNouvelId(){
    $Database = new Database();
    $utilisateurs = $Database->getAllUtilisateurs();

    // On crée un tableau dans lequel on stockera tous les ids existants.
    $IDs = [];

    foreach($utilisateurs as $utilisateur){
      $IDs[] = $utilisateur->getId();
    }

    // Ensuite, on regarde si un chiffre existe dans le tableau, et si non, on l'incrémente
    $i = 1;
    $unique = false;
    while ($unique === false) {
      if (in_array($i, $IDs)) {
        $i ++;
      } else {
        $unique = true;
      }
    }
    return $i;
  }

  public function getObjectToArray(): array {
    return [
      "id" => $this->getId(),
      "nom" => $this->getNom(),
      "prenom" => $this->getPrenom(),
      "mail" => $this->getMail(),
      "adressePost" => $this->getAdressePost(),
      "phone" => $this->getPhone()
    ];
  }
}
