<?php 

include '../src/classes/Reservation.php';
require './classes/DatabaseReservation.php';

var_dump($_POST);

// define variables and set to empty values
$nomErr = $prenomErr = $email = $tel = $adresse = "";
$nom = $prenom = $email = $tel = $adresse = "";
if (
    isset($_POST['nom']) 
    && isset($_POST['prenom']) 
    && isset($_POST['email'])
    && isset($_POST['telephone'])
    && isset($_POST['adressePostale'])
    ){

    //nom et prénom
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        echo $nom . '<br>';
        echo $prenom . '<br>';


    // Email
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            echo $email . '<br>';
        } else {
            header('location:../index.php?erreur='.ERREUR_EMAIL);
        }


    //Numéro de tel

        // regEx pour valider le numéro de téléphone (de chatGPT)
        $pattern = '/^(\+\d{1,3})?\d{6,14}$/';

        // Valider le numéro de téléphone avec l'expression régulière personnalisée
        if (filter_var((int)$_POST['telephone'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$pattern)))) {
            $tel = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
            echo $tel . '<br>';
        } else {
            echo "Numéro de téléphone non valide.";
        }

    //adresse postal
        $adresse = htmlspecialchars($_POST['adressePostale']);
        echo $adresse . '<br>';
   
        //Casques enfants
        if ((int)$_POST['nombreCasquesEnfants']>0){
            $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
        } else {
            $nombreCasquesEnfants = 0;
        }
        echo $nombreCasquesEnfants . '<br>';
    
        //NombreLugesEte
        var_dump((int)$_POST['nombreLugesEte']);
        if ((int)$_POST['nombreLugesEte']>0){
            $nombreLugesEte = htmlspecialchars((int)$_POST['nombreLugesEte']);
        } else {
            $nombreLugesEte = 0;
        }
        echo $nombreLugesEte . '<br>';

        //les formules
        if (!empty($_POST['passSelection'])){
            if ($_POST['passSelection']==='on'){
                $formule = 'tenteNuit1';
            }
        } else {
            $formule = 'vous navez pas selectionne de pass';
        }

        //Tarif reduit
        if (!empty($_POST['tarifReduit'])){
            if ($_POST['tarifReduit']==='on'){
                $tarifReduit = true;
            }
        } else {
            $tarifReduit =  'vous navez pas de tarif reduit';
        }

        

        $nouvelleReservation = new Reservation(
            $nom,
            $prenom,
            $email,
            'null',
            $_POST['nombrePlaces'],
            $tarifReduit,
            $formule,
            $_POST['tenteNuit1'],
            $_POST['vanNuit1'],
            $_POST['enfantsOui'],
            $_POST['nombreCasquesEnfants'],
            $_POST['nombreLugesEte']
        );

        var_dump($nouvelleReservation);


    } else {
        header('location:../index.php?erreur='.ERREUR_CHAMP_VIDE);
    }
