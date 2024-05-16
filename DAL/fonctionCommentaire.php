<?php
error_reporting(E_ERROR | E_PARSE);
include_once '../php/sessionManager.php';

if(isset($_POST['SupprimerCommentaire'])) {
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
    $stmt = $conn->prepare('CALL supprimerCommentaire(:idJoueurVariable, :idItemVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $_GET['idJoueur']);
    $stmt->bindParam(':idItemVariable', $_GET['idItem']);
    $stmt->execute();
    redirect("../itemDetails.php?id=". $_GET['idItem']);
}

if(isset($_POST['AjouterCommentaire'])) {
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
    $stmt = $conn->prepare('CALL AjouterCommentaire(:idJoueurVariable, :idItemVariable, :commentaire, :nbEtoile)');
    $nbEtoile = intval($_POST['nbEtoile']);
    $stmt->bindParam(':idJoueurVariable', $_GET['idJoueur']);
    $stmt->bindParam(':idItemVariable', $_GET['idItem']);
    $stmt->bindParam(':commentaire', $_POST['Commentaire']);
    $stmt->bindParam(':nbEtoile', $nbEtoile);
    $stmt->execute();
    redirect("../inventaire.php?id=". $_GET['idJoueur']);
}

function statsEtoile($idJoueur, $idItem){
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
    $stmt = $conn->prepare('CALL statsNbEtoile(:idJoueurVariable, :idItemVariable)');
    $stmt->bindParam(':idJoueurVariable', $_GET['idJoueur']);
    $stmt->bindParam(':idItemVariable', $_GET['idItem']);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
}