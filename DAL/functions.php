<?php

function Create_Joueur($alias, $prenom, $nom, $password)
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

    $stmt = $conn->prepare('CALL AjouterJoueur(:alias, :prenom, :nom, :password)');
    
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':password', $password);

        $stmt->execute();
}

function LoginJoueur($alias, $motdepasse)
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

    $stmt = $conn->prepare('CALL LoginJoueur(:alias, :password)');
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':password', $motdepasse);

    $stmt->execute();
    $login = $stmt->fetch();
    if($login['alias'])
    {
        $_SESSION['Id'] = $login["idJoueur"];
        $_SESSION['Alias'] = $login["alias"];
        $_SESSION['Prenom'] = $login["prenom"];
        $_SESSION['Nom'] = $login["nom"];
        $_SESSION['Solde'] = $login["solde"];
        $_SESSION['Type'] = $login["typee"];
        $_SESSION['Demande'] = $login["demande"];
        $_SESSION['Password'] = $login["password"];
        $_SESSION['validUser'] = true;
    }
    else
    {
        $_SESSION['ErreurPassword'] = "Mot de Passe Invalide";
    }
}
function CheckAlias($alias)
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

    $stmt = $conn->prepare('CALL CheckAlias(:alias)');
    $stmt->bindParam(':alias', $alias);
    $stmt->execute();
    $login = $stmt->fetch();
    if($login['idJoueur'])
    {
        return true;   
    }
    else
    {
        return false;
    }
}
