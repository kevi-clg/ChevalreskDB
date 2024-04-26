<?php
require 'php/sessionManager.php';
require 'DAL/functionsEnigma.php';


userAccess();

unset($_SESSION['Enigme']);
unset($_SESSION['TypeEnigme']);
unset($_SESSION['DiffEnigme']);
unset($_SESSION['IdEnigme']);
$difficulty = intval($_GET['difficulty']);
$type = intval($_GET['type']);
if($type == 0)
{
    fetchenigme($difficulty);
}
else
{
    fetchenigmerandom();
}
fetchReponses($_SESSION['IdEnigme']);
redirect('Enigma.php');


