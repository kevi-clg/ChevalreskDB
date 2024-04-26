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

