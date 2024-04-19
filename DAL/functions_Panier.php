<?php

function RecherchePanier($idJoueur)
{
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

   $stmt = $conn->prepare('CALL AfficherPanier(:idJoueur)');

   $stmt->bindParam(':idJoueur', $idJoueur);
   
    $stmt->execute();
    return $stmt;
    
}

function AjouterPanier($idItem)
{
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

   $stmt = $conn->prepare('CALL AjouterQuantiterPanier(:idItemParent)');

   $stmt->bindParam(':idItemParent', $idItem);
   
    $stmt->execute();
    return $stmt;
}

function EnleverPanier($idItem)
{
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

   $stmt = $conn->prepare('CALL EnleverQuantitePanier(:idItemParent)');

   $stmt->bindParam(':idItemParent', $idItem);
   
    $stmt->execute();
    return $stmt;
}

function SupprimerItemPanier($idItem)
{
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

   $stmt = $conn->prepare('CALL supprimerPanier(:idItemParent)');

   $stmt->bindParam(':idItemParent', $idItem);
   
    $stmt->execute();
    return $stmt;
}
