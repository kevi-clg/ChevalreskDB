<?php
require 'php/sessionManager.php';



anonymousAccess();

extract($_POST);

$Alias;
$Nom;
$Prenom;

redirect('newJoueurForm.php'); 