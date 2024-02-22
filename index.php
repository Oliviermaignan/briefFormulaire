<?php

include './includes/header.php';
include './includes/formulaire.php';
include './includes/footer.php';
include './src/classes/Database.php';
include './src/classes/User.php';

$nouveauUser = new User ('olivier', 'aaa', 'aaa@aaa.ff', 'aaa', 1, 'admin');
var_dump($nouveauUser);
$newDatabase = new Database();
var_dump ($newDatabase);
$newDatabase->saveUtilisateur($nouveauUser);


?>