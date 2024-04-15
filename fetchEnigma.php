<?php
require 'php/sessionManager.php';
require 'DAL/functionsEnigma.php';


userAccess();

unset($_SESSION['Enigme']);
$difficulty = intval($_GET['difficulty']);
fetchenigme($difficulty);
fetchReponses($_SESSION['IdEnigme']);
redirect('Enigma.php');


