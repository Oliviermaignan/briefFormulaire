<?php

class Reservation {
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_nombreResa;
    private $_tarifReduit;
    private $_formule;
    private $_emplacementTente;
    private $_emplacementVan;
    private $_enfant;
    private $_casqueAntiBruit;
    private $_luge;
    //private $_tarif;

  /**
   * Création d'un nouvel utilisateur
   * @param string $nom      Le nom de l'utilisateur
   * @param string $prenom   Le prénom de l'utilisateur
   * @param string $mail     Le mail de l'utilisateur
   * @param string $password Le mot de passe chiffré de l'utilisateur
   * @param int $id       L'id de l'utilisateur si on le connait, sinon rien.
   */
  function __construct(string $nom, string $prenom,string $mail,int|string $id = "à créer",int $nombreResa, bool $tarifReduit, string $formule, string $emplacementTente, string $emplacementVan, string $enfant, int $casqueAntiBruit, int $luge){
    $this->setId($id);
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setMail($mail);
    $this->setNombreResa($nombreResa);
    $this->setTarifReduit($tarifReduit);
    $this->setFormule($formule);
    $this->setEmplacementTente($emplacementTente);
    $this->setEmplacementVan($emplacementVan);
    $this->setEnfant($enfant);
    $this->setCasqueAntiBruit($casqueAntiBruit);
    $this->setLuge($luge);
    $this->setTarif();
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
  public function getNombreResa(): int {
    return $this->_nombreResa;
  }
  public function setNombreResa(int $nombreResa){
    $this->_nombreResa = $nombreResa;
  }

  public function getTarifReduit(): bool {
    return $this->_tarifReduit;
  }
  public function setTarifReduit(bool $tarifReduit){
    $this->_tarifReduit = $tarifReduit;
  }

  public function getFormule(): string {
    return $this->_formule;
  }
  public function setFormule(string $formule){
    $this->_formule = $formule;
  }

  public function getEmplacementTente(): string {
    return $this->_emplacementTente;
  }
  public function setEmplacementTente(string $emplacementTente){
    $this->_emplacementTente = $emplacementTente;
  }

  public function getEmplacementVan(): string {
    return $this->_emplacementVan;
  }
  public function setEmplacementVan(string $emplacementVan){
    $this->_emplacementVan = $emplacementVan;
  }

  public function getEnfant(): string {
    return $this->_enfant;
  }
  public function setEnfant(string $enfant){
    $this->_enfant = $enfant;
  }

  public function getCasqueAntiBruit(): string {
    return $this->_casqueAntiBruit;
  }
  public function setCasqueAntiBruit(string $casqueAntiBruit){
    $this->_casqueAntiBruit = $casqueAntiBruit;
  }

  public function getLuge(): string {
    return $this->_luge;
  }
  public function setLuge(string $luge){
    $this->_luge = $luge;
  }


  public function setTarif(){
    echo ('5€ pas cher pas cher');
  }
  
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
      "nombreResa" => $this->nombreResa(),
      "tarifReduit" => $this->tarifReduit(),
      "formule" => $this->formule(),
      "emplacementTente" => $this->emplacementTente(),
      "emplacementVan" => $this->emplacementVan(),
      "enfant" => $this->enfant(),
      "casqueAntiBruit" => $this->casqueAntiBruit(),
      "luge" => $this->luge(),
      "tarif" => $this->tarif()
    ];
  }
}
