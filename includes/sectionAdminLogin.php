<?php

include '../includes/header.php';
require '../src/classes/ReservationDatabase.php';

$lignes = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');

// Créer un tableau pour stocker les données des réservations
$reservations = [];

// Parcourir chaque ligne du fichier CSV
foreach ($lignes as $ligne) {
    // Diviser la ligne en un tableau de valeurs CSV
    $data = str_getcsv($ligne);
    // Ajouter les données de la réservation au tableau des réservations
    $reservations[] = $data;
}

?>

<table border="solid">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <!-- <th>Tel</th>
            <th>AdressePost</th> -->
            <th>Nombre Resa</th>
            <th>Tarif Reduit</th>
            <th>Formule Choisie</th>
            <th>Emplacement Tente</th>
            <th>Emplacement Van</th>
            <th>Enfant</th>
            <th>Casque Anti Bruit</th>
            <th>Luge</th>
            <th>Tarif</th>
            <!-- Ajoutez d'autres colonnes pour afficher les détails de la réservation -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <!-- Afficher les données de chaque réservation -->
                <td><?= $reservation[0] ?></td>
                <td><?= $reservation[1] ?></td>
                <td><?= $reservation[2] ?></td>
                <td><?= $reservation[3] ?></td>
                <td><?= $reservation[4] ?></td>
                <td><?= $reservation[5] ?></td>
                <td><?= $reservation[6] ?></td>
                <td><?= $reservation[7] ?></td>
                <td><?= $reservation[8] ?></td>
                <td><?= $reservation[9] ?></td>
                <td><?= $reservation[10] ?></td>
                <td><?= $reservation[11] ?></td>
                <td><?= $reservation[12] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>