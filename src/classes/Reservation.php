<?php
require_once './classes/ReservationDatabase.php';

class Reservation {
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_nombreResa;
    private $_tarifReduit;
    private $_formulechoisie;
    private $_emplacementTente;
    private $_emplacementVan;
    private $_enfant;
    private $_casqueAntiBruit;
    private $_luge;
    private $_tarif;

  /**
   * Création d'un nouvel utilisateur
   * @param string $nom      Le nom de l'utilisateur
   * @param string $prenom   Le prénom de l'utilisateur
   * @param string $mail     Le mail de l'utilisateur
   * @param string $password Le mot de passe chiffré de l'utilisateur
   * @param int $id       L'id de l'utilisateur si on le connait, sinon rien.
   */
  function __construct(int|string $id = "à créer", string $nom, string $prenom,string $mail, string $tel, string $adresse, int $nombreResa, bool $tarifReduit, string $formulechoisie, array $emplacementTente, array $emplacementVan, string $enfant, int $casqueAntiBruit, int $luge, int $tarif){
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setMail($mail);
    $this->setNombreResa($nombreResa);
    $this->setTarifReduit($tarifReduit);
    $this->setformulechoisie($formulechoisie);
    $this->setEmplacementTente($emplacementTente);
    $this->setEmplacementVan($emplacementVan);
    $this->setEnfant($enfant);
    $this->setCasqueAntiBruit($casqueAntiBruit);
    $this->setLuge($luge);
    $this->setTarif($tarif);
    $this->setId($id);
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

  public function getformulechoisie(): string {
    return $this->_formulechoisie;
  }
  public function setformulechoisie(string $formulechoisie){
    $this->_formulechoisie = $formulechoisie;
  }

  public function getEmplacementTente(): array {
    return $this->_emplacementTente;
  }
  public function setEmplacementTente(array $emplacementTente){
    $this->_emplacementTente = $emplacementTente;
  }

  public function getEmplacementVan(): array {
    return $this->_emplacementVan;
  }
  public function setEmplacementVan(array $emplacementVan){
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

  public function getTarif(): string {
    return $this->_tarif;
  }
  public function setTarif(string $tarif){
    $this->_tarif = $tarif;
  }

  
  private function CreerNouvelId(){
    $ReservationDatabase = new ReservationDatabase();
    $utilisateurs = $ReservationDatabase->getAllReservations();

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
      "nombreResa" => $this->getNombreResa(),
      "tarifReduit" => $this->getTarifReduit(),
      "formulechoisie" => $this->getformulechoisie(),
      "emplacementTente" => implode(',',$this->getEmplacementTente()),
      "emplacementVan" => implode(',',$this->getEmplacementVan()),
      "enfant" => $this->getEnfant(),
      "casqueAntiBruit" => $this->getCasqueAntiBruit(),
      "luge" => $this->getLuge(),
      "tarif" => $this->getTarif()
    ];
  }
}
