<?php

function fetchenigme()
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

    $stmt = $conn->prepare('CALL FetchEnigme()');

    $stmt->execute();
    $enigme = $stmt->fetch();
    $_SESSION['IdEnigme'] = $enigme["idQuestion"];
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

    $stmt->bindParam(':IdQuestion', $_SESSION["idQuestion"]);

    $stmt->execute();

}
