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
    $stmt = $conn->prepare('CALL AjouterCommentaire(:idJoueurVariable, :idItemVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $_GET['idJoueur']);
    $stmt->bindParam(':idItemVariable', $_GET['idItem']);
    $stmt->bindParam(':commentaire', $_GET['comm']);
    $stmt->bindParam(':nbEtoile', $_GET['etoile']);
    $stmt->execute();
    redirect("../itemDetails.php?id=". $_GET['idItem']);
}