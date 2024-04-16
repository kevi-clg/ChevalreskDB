<?php
require 'php/sessionManager.php';
require 'DAL/functionsEnigma.php';
require 'DAL/functions.php';


userAccess();

$Reponsechoisie = intval($_GET['choice']);

if(intval($_SESSION['Reponses'][$Reponsechoisie]["flag"]) == 1)
{
    $_SESSION['Message'] = '<script>alert("Bonne Réponse ! Vos Écus ont été ajoutés à votre solde")</script>'; 
    if(intval($_SESSION['DiffEnigme']) ==1)
    {
        $solde = 50;
    }
    else if(intval($_SESSION['DiffEnigme']) == 2)
    {
        $solde =100;
    }
    else
    {
        $solde = 200;
    }

    AddEcus($solde);
    BonneReponse();
    LoginJoueur($_SESSION['Alias'], $_SESSION['Password']);
}
else
{
    $_SESSION['Message'] = '<script>alert("Perdus !")</script>'; 
}
unset($_SESSION['Enigme']);
unset($_SESSION['idQuestion']);
unset($_SESSION['Reponses']);
redirect('Enigma.php');
