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