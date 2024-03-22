<?php


function Create_Joueur($alias, $prenom, $nom, $password)
{
    try {
        $conn = new PDO('mysql:host=localhost;dbname=dbchevalersk18',"root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Throwable $th) {
        throw new PDOException($th->getMessage()) ;
    }
    $stmt = $conn->prepare('CALL AjouterJoueur(:alias, :prenom, :nom, :password)');
    
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':password', $password);

        $stmt->execute();
}

function LoginJoueur($alias, $password)
{
    try {
        $conn = new PDO('mysql:host=localhost;dbname=dbchevalersk18',"root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Throwable $th) {
        throw new PDOException($th->getMessage()) ;
    }
    $stmt = $conn->prepare('CALL LoginJoueur(:alias, :password)');
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $login = $stmt->fetch();
    if($login[0])
    {
        $_SESSION['Id'] = $login["idJoueur"];
        $_SESSION['Alias'] = $login["alias"];
        $_SESSION['Prenom'] = $login["prenom"];
        $_SESSION['Nom'] = $login["nom"];
        $_SESSION['Solde'] = $login["solde"];
        $_SESSION['Type'] = $login["typee"];
        $_SESSION['Demande'] = $login["demande"];
        $_SESSION['Password'] = $login["password"];
        $_SESSION['ValidUser'] = true;
    }
}