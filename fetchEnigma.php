<?php
require 'php/sessionManager.php';
require 'DAL/functionsEnigma.php';


userAccess();

unset($_SESSION['Enigme']);

fetchenigme();

redirect('Enigma.php');


