<?php

function fetchenigme($difficulty)
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

    $stmt = $conn->prepare('CALL FetchEnigme(:DiffParam)');

    $stmt->bindParam(':DiffParam', $difficulty);

    $stmt->execute();
    $enigme = $stmt->fetch();
    $_SESSION['IdEnigme'] = $enigme["idQuestion"];
    $_SESSION['DiffEnigme'] = $enigme["diff"];
    $_SESSION['Enigme'] = $enigme["enigme"];
}
function fetchReponses($idquestion)
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

    $stmt = $conn->prepare('CALL FetchReponse(:IdQuestion)');

    $stmt->bindParam(':IdQuestion', $_SESSION['IdEnigme']);

    $stmt->execute();
    $reponse = $stmt->fetchAll();
    $_SESSION['Reponses'] = $reponse; 
}

function AddEcus($soldebonus)
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

    $stmt = $conn->prepare('CALL AjouterSolde(:IdJoueur, :soldeBonus)');

    $stmt->bindParam(':IdJoueur', $_SESSION['Id']);
    $stmt->bindParam(':soldeBonus', $soldebonus);

    $stmt->execute();
}
