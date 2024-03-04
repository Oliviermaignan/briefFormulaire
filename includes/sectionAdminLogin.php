<?php

include '../includes/header.php';
require '../src/classes/ReservationDatabase.php';

// $lignes = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');


$DB = new ReservationDatabase();
$reservations = $DB->getAllReservations();

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

<table border="solid">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Tel</th>
            <th>AdressePost</th>
            <th>Nombre Resa</th>
            <th>Tarif Reduit</th>
            <th>Formule Choisie</th>
            <th>Emplacement Tente</th>
            <th>Emplacement Van</th>
            <th>Enfant</th>
            <th>Casque Anti Bruit</th>
            <th>Luge</th>
            <th>Tarif</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <!-- Afficher les données de chaque réservation -->
                <td><?= $reservation->getId()?></td>
                <td><?= $reservation->getNom() ?></td>
                <td><?= $reservation->getPrenom()?></td>
                <td><?= $reservation->getMail()?></td>
                <td><?= $reservation->getTel()?></td>
                <td><?= $reservation->getAdresse() ?></td>
                <td><?= $reservation->getNombreResa() ?></td>
                <td><?= $reservation->getTarifReduit()?></td>
                <td><?= $reservation->getformulechoisie()?></td>
                <td><?= $reservation->getEmplacementTente()?></td>
                <td><?= $reservation->getEmplacementVan()?></td>
                <td><?= $reservation->getEnfant() ?></td>
                <td><?= $reservation->getCasqueAntiBruit() ?></td>
                <td><?= $reservation->getLuge()?></td>
                <td><?= $reservation->getTarif()?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>