<?php 

include '../src/classes/Reservation.php';

var_dump($_POST);

$nouvelleReservation = new Reservation('maignan', 'Olivier','aaa@aaa.fr', 'null', 1,true, 'aaa', 'aaa', 'aaa', 'aaa', 1, 1, 40);

var_dump($nouvelleReservation);