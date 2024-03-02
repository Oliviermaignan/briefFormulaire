<?php 

include '../includes/header.php';
include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'ReservationDatabase.php';

$id_reservation = (string) $_GET['id_reservation'];


$lignes = file( dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');
foreach ($lignes as $ligne){
    if(str_contains($ligne, $id_reservation)){
        $lastReservation = str_getcsv($ligne);
    }
}

?>

<div class = "recap">
    <p> Merci pour votre réservation. À très bientot ! </p>
    <h1>Récapitulatif de la réservation</h1>
    <div>
        <ul>
            <li>Nom: <?php echo $lastReservation[1]; ?> Prénom: <?php echo $lastReservation[2]; ?></li>
            <li>Mail : <?= $lastReservation[3]; ?></li>
            <li>Réservation pour <?php echo $lastReservation[4]; ?> adulte(s) et <?php echo $lastReservation[5]; ?> enfant(s).</li>
            <li>Type de pass : <?php echo $lastReservation[6]; ?>.</li>
            <li>Réservation de tente : <?php echo $lastReservation[7]; ?>.</li>
            <li>Van aménagé : <?php echo $lastReservation[8]; ?>.</li>
            <li>Remarque : <?php echo $lastReservation[9]; ?>.</li>
            <li>Nombre de casque anti-bruit : <?php echo $lastReservation[10]; ?>.</li>
            <li>Nombre de décente de luge : <?php echo $lastReservation[11]; ?>.</li>
            <li>Montant total : <?php echo $lastReservation[12]; ?> euros.</li>
        </ul>
    </div>
</div>