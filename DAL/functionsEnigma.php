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

    $stmt = $conn->prepare('CALL FetchEnigme(:DiffParam, :IdJoueurPara)');

    $stmt->bindParam(':DiffParam', $difficulty);
    $stmt->bindParam(':IdJoueurPara', $_SESSION['Id']);
    $stmt->execute();
    $enigme = $stmt->fetch();
    if(!$enigme)
    {
        $_SESSION['Message'] = '<div style="color:black;">Aucune Enigme de ce type disponible ! Essayer une autre options</div>'; 

    }
    else
    {
        $_SESSION['IdEnigme'] = $enigme["idQuestion"];
        $_SESSION['DiffEnigme'] = $enigme["diff"];
        $_SESSION['Enigme'] = $enigme["enigme"];
        $_SESSION['TypeEnigme'] = $enigme["typee"];
    }
}
function fetchenigmerandom()
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

    $stmt = $conn->prepare('CALL fetchenigmerandom(:IdJoueurPara)');
    $stmt->bindParam(':IdJoueurPara', $_SESSION['Id']);
    $stmt->execute();
    $enigme = $stmt->fetch();
    if(!$enigme)
    {
        $_SESSION['Message'] = '<div style="color:black;">Aucune Enigme de ce type disponible ! Essayer une autre option</div>'; 

    }
    else
    {
        $_SESSION['IdEnigme'] = $enigme["idQuestion"];
        $_SESSION['DiffEnigme'] = $enigme["diff"];
        $_SESSION['Enigme'] = $enigme["enigme"];
        $_SESSION['TypeEnigme'] = $enigme["typee"];
    }
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

function BonneReponse()
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
    $id = $_SESSION['IdEnigme'];
    $idjoueur = $_SESSION['Id'];
    $stmt = $conn->prepare("INSERT INTO enigmesrepondues(IdQuestion, IdJoueur)
   VALUES ('$id', '$idjoueur')");

    $stmt->execute();

    $stmt = $conn->prepare('CALL CountQuestions(:IdJoueur)');
    $stmt->bindParam(':IdJoueur', $_SESSION['Id']);

    $stmt->execute();
    $rep = $stmt->fetch();

    $val = intval($rep['Count']);
    if ($val >= 3) {
        $stmt = $conn->prepare("Update joueurs Set typee = \"Alchimiste\" where IdJoueur=$idjoueur");
        $stmt->execute();
        
        $_SESSION['Message'] = '<div style="color:black;">Bonne Réponse ! Vos Écus ont été ajoutés à votre solde et vous venez de devenir Alchimiste !</div>'; 
        $_SESSION['Type']  = "Alchimiste";
    }
}

