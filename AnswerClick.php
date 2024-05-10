<?php
require 'php/sessionManager.php';
require 'DAL/functionsEnigma.php';
require 'DAL/functions.php';


userAccess();
$host = 'localhost';
$db = 'dbchevalersk18';
$user = 'root';
$password = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (\Throwable $th) {
    throw new PDOException($th->getMessage());
}


$Reponsechoisie = intval($_GET['choice']);
$diffid= intval($_SESSION['DiffEnigme']);
if(intval($_SESSION['Reponses'][$Reponsechoisie]["flag"]) == 1)
{
    $_SESSION['Message'] = '<div style="color:black;">Bonne Réponse ! Vos Écus ont été ajoutés à votre solde</div>'; 
    if($diffid ==1)
    {
        $solde = 50;
    }
    else if($diffid== 2)
    {
        $solde =100;
    }
    else
    {
        $solde = 200;
    }
    $stmt = $conn->prepare("UPDATE enigmastats SET Bonne=Bonne+1 WHERE Diff = $diffid");
    $stmt->execute();
    AddEcus($solde);
    BonneReponse();
    LoginJoueur($_SESSION['Alias'], $_SESSION['Password']);
}
else
{
    $stmt = $conn->prepare("UPDATE enigmastats SET Mauvaise=Mauvaise+1 WHERE Diff = $diffid");
    $stmt->execute();
    $_SESSION['Message'] = '<div style="color:black;">Perdus !</div>'; 
}
unset($_SESSION['Enigme']);
unset($_SESSION['idQuestion']);
unset($_SESSION['Reponses']);
redirect('Enigma.php');
