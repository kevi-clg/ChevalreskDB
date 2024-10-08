<?php

function Create_Joueur($alias, $prenom, $nom, $motdepasse, $avatar)
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

    $stmt = $conn->prepare('CALL AjouterJoueur(:alias, :prenom, :nom, :password, :avatar)');
    
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':password', $motdepasse);
    $stmt->bindParam(':avatar', $avatar);
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
        $_SESSION['Niveau'] = $login["niveau"];
        $_SESSION['Demande'] = $login["demande"];
        $_SESSION['Password'] = $login["password"];
        $_SESSION['validUser'] = true;
        $_SESSION['photo'] = $login["avatar"];
        $_SESSION['IsAdmin'] = $login["admin"];
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

function EditJoueur($alias, $prenom, $nom, $motdepasse, $avatar, $id)
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

    $stmt = $conn->prepare('CALL EditJoueur(:alias, :prenom, :nom, :password, :avatar, :id)');
    
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':password', $motdepasse);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':id', $id);
        $stmt->execute();
    LoginJoueur($alias, $motdepasse);
    redirect('ProfileList.php');    
}
function SearchCommentaire($idjoueur, $idItem)
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

    $stmt = $conn->prepare('CALL FetchCommentaire(:IdJoueurPara, :IdItemPara)');
    $stmt->bindParam(':IdJoueurPara', $idjoueur);
    $stmt->bindParam(':IdItemPara', $idItem);

    $stmt->execute();
    $comm = $stmt->fetch();
    If($comm["nbEtoile"])
    {
    $_SESSION['NbEtoile'] = $comm["nbEtoile"];
    $_SESSION['commentaire'] = $comm["commentaire"];
    }
    
}