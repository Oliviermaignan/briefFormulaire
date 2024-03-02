<?php

require_once '../src/classes/Reservation.php';
require_once './classes/ReservationDatabase.php';

var_dump($_POST);

$reservationDatabase = new ReservationDatabase();
// var_dump($reservationDatabase);
// var_dump($reservationDatabase->getAllReservations());
// define variables and set to empty values
$nomErr = $prenomErr = $email = $tel = $adresse = "";
$nom = $prenom = $email = $tel = $adresse = "";
if (
    isset($_POST['nom'])
    && isset($_POST['prenom'])
    && isset($_POST['email'])
    && isset($_POST['telephone'])
    && isset($_POST['adressePostale'])
) {

    //nom et prénom
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);


    // Email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    } else {
        header('location:../index.php?erreur=' . ERREUR_EMAIL);
    }


    //Numéro de tel

    // regEx pour valider le numéro de téléphone (de chatGPT)
    $pattern = '/^(\+\d{1,3})?\d{6,14}$/';

    // Valider le numéro de téléphone avec l'expression régulière personnalisée
    if (filter_var((int)$_POST['telephone'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern)))) {
        $tel = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        echo 'erreur tel';
    }

    //adresse postal
    $adresse = htmlspecialchars($_POST['adressePostale']);


    //Casques enfants
    if ((int)$_POST['nombreCasquesEnfants'] > 0) {
        $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
    } else {
        $nombreCasquesEnfants = 0;
    }


    //NombreLugesEte
    if ((int)$_POST['nombreLugesEte'] > 0) {
        $nombreLugesEte = htmlspecialchars((int)$_POST['nombreLugesEte']);
    } else {
        $nombreLugesEte = 0;
    }

    $nombrePlaces = (int) $_POST['nombrePlaces'];
    $tarif = 0;
    $tarifReduit = (bool)false;
    $formuleChoisie = "";

    //gestion du plein tarif
    if (isset($_POST['passSelection'])) {
        if ($_POST['passSelection'] === 'pass1jour') {
            switch ($_POST['pass1jour']) {
                case 'choixJour1':
                    $formuleChoisie = 'pass 1 jour: premier jour';
                    $tarif = (int) 40 * $nombrePlaces;
                    break;

                case 'choixJour2':
                    $formulechoisie = 'pass 1 jour: deuxieme jour';
                    $tarif = (int) 40 * $nombrePlaces;
                    break;

                default:
                    $formulechoisie = 'pass 1 jour: troisieme jour';
                    $tarif = (int) 40 * $nombrePlaces;
                    break;
            }
        }
        if ($_POST['passSelection'] === 'pass2jours') {
            switch ($_POST['pass1jour']) {
                case 'choixJour12':
                    $formulechoisie = 'Pass 2 jours: premier et deuxieme jour';
                    $tarif = (int) 70 * $nombrePlaces;
                    break;

                default:
                    $formulechoisie = 'Pass 2 jours: deuxieme et troisieme jour';
                    $tarif = (int) 70 * $nombrePlaces;
                    break;
            }
        }
        if ($_POST['passSelection'] === 'pass3jours') {
            $formulechoisie = 'Pass 3 jours';
            $tarif = (int) 100 * $nombrePlaces;
        }
    }
    //gestion du tarif reduit
    if (isset($_POST['passSelectionTarifReduit'])) {
        switch ($_POST['passSelectionTarifReduit']) {
            case 'pass1jourreduit':
                $formulechoisie = 'Pass 1 jours en tarif réduit';
                $tarif = (int) 25 * $nombrePlaces;
                $tarifReduit = true;
                break;
            case 'pass2joursreduit':
                $formulechoisie = 'Pass 2 jours en tarif réduit';
                $tarif = (int) 50 * $nombrePlaces;
                $tarifReduit = true;
                break;

            default:
                $formulechoisie = 'Pass 2 jours en tarif réduit';
                $tarif = (int) 65 * $nombrePlaces;
                $tarifReduit = true;
                break;
        }
    }

    $reservationTente = [];
    $reservationVan = [];
    //gestion du camping
    if ($_POST['campingTente'] === 'on') {
        if (isset($_POST['nuitTente'])) {
            switch ($_POST['nuitTente']) {
                case 'tentenuit1':
                    $reservationTente[] = 'tente 1ere nuit';
                    $tarif = $tarif + (int) 5 * $nombrePlaces;
                    break;
                case 'tentenuit2':
                    $reservationTente[] = 'tente 2eme nuit';
                    $tarif = $tarif + (int) 5 * $nombrePlaces;
                    break;
                case 'tentenuit3':
                    $reservationTente[] = 'tente 3eme nuit';
                    $tarif = $tarif + (int) 5 * $nombrePlaces;
                    break;
                case 'tente3nuits':
                    $reservationTente[] = '3 nuits en tente';
                    $tarif = $tarif + (int) 12 * $nombrePlaces;
                    break;
                default:
                    $reservationTente[] = 'pas de reservation de tente';
                    break;
                }
            }
        } else {
            $reservationTente[] = 'pas de reservation de tente';
        }
        if ($_POST['campingVan'] === 'on') {
            if (isset($_POST['vanNuit'])) {
                switch ($_POST['vanNuit']) {
                    case 'vanNuit1':
                        $reservationVan[] = 'van 1ere nuit';
                        $tarif = $tarif + (int) 5 * $nombrePlaces;
                        break;
                    case 'vanNuit2':
                        $reservationVan[] = 'van 2eme nuit';
                        $tarif = $tarif + (int) 5 * $nombrePlaces;
                        break;
                    case 'vanNuit3':
                        $reservationVan[] = 'van 3eme nuit';
                        $tarif = $tarif + (int) 5 * $nombrePlaces;
                        break;
                    case 'van3Nuits':
                        $reservationVan[] = '3 nuits en van';
                        $tarif = $tarif + (int) 12 * $nombrePlaces;
                        break;
                    default:
                        $reservationVan[] = 'pas de reservation de van';
                        break;
                }
            }
        }  else {
            $reservationVan[] = 'pas de van aménagé';
        }

    // Vérification si le champ 'nombreCasquesEnfants' est soumis dans le formulaire
    if (isset($_POST['nombreCasquesEnfants'])) {
        // Récupération du nombre de casques choisis depuis le formulaire
        $nombreCasquesEnfants = intval($_POST['nombreCasquesEnfants']);

        // Traitement de la variable $enfant selon les valeurs du formulaire
        if (isset($_POST['enfants'])) {
            $enfant = htmlspecialchars($_POST['enfants']);
            switch ($enfant) {
                case 'sansEnfant':
                    $enfant = 'vous venez sans enfant';
                    break;

                default:
                    $enfant = 'vous venez avec un ou plusieurs enfants';
                    break;
            }
        } else {
            $enfant = 'vous venez sans enfant';
        }
    }

    $nouvelleReservation = new Reservation(
        $nom,
        $prenom,
        $email,
        $nombrePlaces,
        $tarifReduit,
        $formulechoisie,
        $reservationTente,
        $reservationVan,
        $enfant,
        $nombreCasquesEnfants,
        $nombreLugesEte,
        $tarif
    );

    //je recupe l'id
    $id_reservation = $nouvelleReservation->getId();

    // Rediriger l'utilisateur vers recap.php en passant l'ID de la réservation comme paramètre GET

    $retour = $reservationDatabase->saveReservation($nouvelleReservation);

    if ($retour) {
        header("Location: ../includes/sectionRecap.php?id_reservation=$id_reservation");
        die;
    } else {
        echo 'erreur ecriture base de donnée';
    }
}
