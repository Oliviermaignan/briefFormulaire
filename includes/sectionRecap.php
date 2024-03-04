<?php 

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'ReservationDatabase.php';
include '../src/classes/Reservation.php';
$id_reservation = (string) $_GET['id_reservation'];

$lignes = file( dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR . 'reservation.csv');

$DB = new ReservationDatabase();
$utilisateurs = $DB->getAllReservations();
?> 

<div class = "recap">
    <p> Merci pour votre réservation. À très bientot ! </p>
    <h1>Récapitulatif de la réservation</h1>
</div>

<?php 
$found = false; 
foreach ($utilisateurs as $utilisateur) { 
    if ((int)$utilisateur->getId()===(int)$id_reservation){
        $found = true;     
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
}
// Check if user is not found after the loop completes
if (!$found) {
    echo "Nous ne vous avons pas trouvé";
}
?>

