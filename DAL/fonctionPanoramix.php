<?php
error_reporting(E_ERROR | E_PARSE);
include_once '../php/sessionManager.php';

function getTableCraft($idItem){
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
    $stmt = $conn->prepare('CALL getTableCraft(:idItemVariable)');
    
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function getInventaireId($idJoueur,$idItem){
    
    if($idJoueur == -1){
        redirect("/Chevalresk/itemDetails.php?id=". $idItem);
    }
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
    $stmt = $conn->prepare('CALL getInventaireId(:idJoueurVariable, :idItemVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $idJoueur);
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function Concocter($idJoueur,$idItem,$idE1,$idE2,$quantiteE1,$quantiteE2,$soldePayer){
    if($idJoueur == -1 || $_SESSION['Solde'] < $soldePayer){
        redirect("/Chevalresk/itemDetails.php?id=". $idItem . "&solde=False");
    }
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
    $stmt = $conn->prepare('CALL concocterPotion(:idJoueurVariable, :idItemVariable, :idE1, :idE2, :quantiteE1, :quantiteE2, :soldePayer)');
    
    $stmt->bindParam(':idJoueurVariable', $idJoueur);
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->bindParam(':idE1', $idE1);
    $stmt->bindParam(':idE2', $idE2);
    $stmt->bindParam(':quantiteE1', $quantiteE1);
    $stmt->bindParam(':quantiteE2', $quantiteE2);
    $stmt->bindParam(':soldePayer', $soldePayer);
    $stmt->execute();
    $_SESSION['Solde'] -= $soldePayer;
    
    redirect("../inventaire.php");
}

if(isset($_POST['concocter'])) {
    // Appeler votre fonction PHP ici
    Concocter($_GET['idJoueur'],$_GET['idItem'],$_GET['idE1'], $_GET['idE2'],$_GET['quantiteE1'],$_GET['quantiteE2'],$_GET['soldePayer']);
}
