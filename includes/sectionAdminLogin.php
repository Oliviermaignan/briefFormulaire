<?php

include '../includes/header.php';
require '../src/traitement.php';

?>

<div class="admin-container">
    <p>Vous êtes connecté en tant qu'administratrice</p>
    <div>Infos utilisateurs :</div>
    <div>User1</div>
    <?php 
    var_dump($_SERVER);
    ?>
    <div><?=User->getFirstName()?></div>
    <div><?=User->getName()?></div>
    <div><?=User->getEmail()?></div>
</div>