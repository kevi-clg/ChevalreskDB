<?php

function RecherchePanier($id)
{

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
