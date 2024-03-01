<?php 

include '../includes/header.php';
include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'ReservationDatabase.php';

var_dump(dirname(__DIR__));

$lignes = file( dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');
var_dump($lignes);
foreach ($lignes as $ligne){
    $data[] = str_getcsv($ligne);
}
var_dump($data);
?>

<div class = "recap">
    <p> Merci pour votre réservation. À très bientot ! </p>
    <h1>Récapitulatif de la réservation</h1>
    <!-- <ul>
        <li>ID : <?php echo $reservation->getId(); ?></li>
        <li>Nom : <?php echo $reservation->getNom(); ?></li>
        <li>Prénom : <?php echo $reservation->getPrenom(); ?></li>
        <li>Email : <?php echo $reservation->getMail(); ?></li>
        <li>Nombre de réservations : <?php echo $reservation->getNombreResa(); ?></li>
        <li>Tarif réduit : <?php echo $reservation->getTarifReduit() ? 'Oui' : 'Non'; ?></li>
        <li>Formule choisie : <?php echo $reservation->getFormuleChoisie(); ?></li>
        <li>Emplacements Tente : <?php echo implode(', ', $reservation->getEmplacementTente()); ?></li>
        <li>Emplacements Van : <?php echo implode(', ', $reservation->getEmplacementVan()); ?></li>
        <li>Enfant : <?php echo $reservation->getEnfant(); ?></li>
        <li>Casque anti-bruit : <?php echo $reservation->getCasqueAntiBruit(); ?></li>
        <li>Luge : <?php echo $reservation->getLuge(); ?></li>
        <li>Tarif : <?php echo $reservation->getTarif(); ?></li>
    </ul> -->
</div>