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
