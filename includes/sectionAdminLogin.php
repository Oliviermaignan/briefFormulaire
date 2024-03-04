<?php

include '../includes/header.php';
require '../src/classes/ReservationDatabase.php';
require '../src/classes/Reservation.php';

// $lignes = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');


$DB = new ReservationDatabase();
$utilisateurs = $DB->getAllReservations();

// // Créer un tableau pour stocker les données des réservations
// $reservations = [];

// // Parcourir chaque ligne du fichier CSV
// foreach ($lignes as $ligne) {
//     // Diviser la ligne en un tableau de valeurs CSV
//     $data = str_getcsv($ligne);
//     // Ajouter les données de la réservation au tableau des réservations
//     $reservations[] = $data;
// }

?>



<?php 
foreach ($utilisateurs as $utilisateur) { 
        ?>
        <ul>
            <li>id: <?= $utilisateur->getId() ?></li>
            <li>nom :<?= $utilisateur->getNom() ?></li>
            <li>prenom :<?= $utilisateur->getPrenom() ?></li>
            <li>mail: <?= $utilisateur->getMail() ?></li>
            <li>tel: <?= $utilisateur->getTel() ?></li>
            <li>adresse: <?= $utilisateur->getAdresse() ?></li>
            <li>vous avez reservez <?= $utilisateur->getNombreResa() ?> place(s)</li>
            <li>vous avez un tarif reduit:<?= $utilisateur->getTarifReduit() ?></li>
            <li>vous avez choisi le:<?= $utilisateur->getFormuleChoisie() ?></li>
            <li><?= implode(",",$utilisateur->getEmplacementTente()) ?></li>
            <li><?= implode(",",$utilisateur->getEmplacementVan()) ?></li>
            <li>remarque :<?= $utilisateur->getEnfant() ?></li>
            <li>vous voulez <?= $utilisateur->getCasqueAntiBruit() ?> casque anti-bruit</li>
            <li>vous voulez <?= $utilisateur->getLuge() ?> déscente de luge</li>
            <li>Vous nous devez<?= $utilisateur->getTarif() ?></li>
    </ul>
        <?php 
    }


