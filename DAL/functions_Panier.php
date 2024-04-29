<?php
error_reporting(E_ERROR | E_PARSE);
include_once '../php/sessionManager.php';
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

function AjouterPanier($idJoueur,$idItem){
    
    
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
    redirect("../panier.php?id=". $idJoueur);
}
if(isset($_POST['AjouterPanier'])) {
    // Appeler votre fonction PHP ici
    AjouterPanier($_GET['idJoueur'],$_GET['idItem']);
}

function EnleverPanier($idJoueur,$idItem){
    
    
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
    $stmt = $conn->prepare('CALL EnleverPanier(:idJoueurVariable, :idItemVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $idJoueur);
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    redirect("../panier.php?id=". $idJoueur);
}
if(isset($_POST['EnleverPanier'])) {
    // Appeler votre fonction PHP ici
    EnleverPanier($_GET['idJoueur'],$_GET['idItem']);
}

function SupprimerItemPanier($idJoueur,$idItem){
    
    
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
    $stmt = $conn->prepare('CALL supprimerPanier(:idItemVariable, :idJoueurVariable)');
    
    $stmt->bindParam(':idJoueurVariable', $idJoueur);
    $stmt->bindParam(':idItemVariable', $idItem);
    $stmt->execute();
    redirect("../panier.php?id=". $idJoueur);
}
if(isset($_POST['supprimerPanier'])) {
    // Appeler votre fonction PHP ici
    SupprimerItemPanier($_GET['idJoueur'],$_GET['idItem']);
}

function payerPanier($idJoueur,$total){
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

   $stmt = $conn->query("SELECT solde from joueurs where idJoueur = (" . $idJoueur . ")");

   $solde = $stmt->fetch();
   $solde = intval($solde['solde']);
   $total = intval($total);

   if($total <= $solde){
        //Payer 
        $solde = $solde - $total;
        $stmt = $conn->query("UPDATE joueurs SET solde = (" . $solde . ") WHERE idJoueur = (" . $idJoueur . ")");
        $stmt->execute();

        //Ajouter a l'inventaire
        $stmt = $conn->query("SELECT quantite from panier where idJoueur = (" . $idJoueur . ")");
        $quantiter = $stmt->fetch();
        $stmt = $conn->query("SELECT idItem from panier where idJoueur = (" . $idJoueur . ")");
        $idItem = $stmt->fetch();

        $stmt = $conn->prepare('CALL AjouterInventaireDepuisPanier(:idJoueurVariable, :idItemVariable, :quantiterPanier)');
        $stmt->bindParam(':idJoueurVariable', $idJoueur);
        $stmt->bindParam(':idItemVariable', $idItem);
        $stmt->bindParam(':quantiterPanier',$quantiter);
        $stmt->execute();

        //vider Panier
        $stmt = $conn->prepare('CALL viderPanier(:idJoueurVariable)');
        $stmt->bindParam(':idJoueurVariable', $idJoueur);
        $stmt->execute();
   }
   else{
      print("votre Solde ne permet pas de payer votre facture");
   }
   redirect("../panier.php?id=". $idJoueur);
}
if(isset($_POST['payerPanier'])) {
    // Appeler votre fonction PHP ici
    payerPanier($_GET['idJoueur'],$_GET['total']);
}