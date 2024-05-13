<?php
error_reporting(E_ERROR | E_PARSE);
include_once '../php/sessionManager.php';
function AjouterPanier($idJoueur,$idItem){
    
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
    $stmt = $conn->prepare('CALL AjouterPanier(:idJoueurVariable, :idItemVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $idJoueur);
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    redirect("../itemDetails.php?id=". $idItem);
}

function RechercherItemId($idItem){
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
    $stmt = $conn->prepare('CALL rechercheItemId(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function rechercheCommentaire($idItem){
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
    $stmt = $conn->prepare('CALL rechercheCommentaire(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list;
}



function RechercheArme($idItem){
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
    $stmt = $conn->prepare('CALL rechercheArme(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function RechercheArmure($idItem){
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
    $stmt = $conn->prepare('CALL rechercheArmure(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function RechercheElement($idItem){
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
    $stmt = $conn->prepare('CALL rechercheElement(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function RecherchePotion($idItem){
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
    $stmt = $conn->prepare('CALL recherchePotion(:idItemVariable)');
    
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
    
}

function MoyenneEtoile($idItem){
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
    $stmt = $conn->prepare('CALL moyenneEvaluation(:idItemVariable)');
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    $list = [];
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    return $list[0];
}


if(isset($_POST['AjouterPanier'])) {
    // Appeler votre fonction PHP ici
    AjouterPanier($_GET['idJoueur'],$_GET['idItem']);
}

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