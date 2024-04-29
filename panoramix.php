<?php
include_once 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionPanoramix.php';

if(!isvalidUser()){
    redirect("LoginForm.php");
}



$idJoueur = $_SESSION['Id'];

$idItem = $_GET['idItem'];

$itemsCraft = getTableCraft($idItem);

$idE1 = $itemsCraft['idE1'];
$idE2 = $itemsCraft['idE2'];
$nomPotion = $itemsCraft['nomPotion'];
$nomE1 = $itemsCraft['nomE1'];
$nomE2 = $itemsCraft['nomE2'];
$quantiteE1 = $itemsCraft['quantiteE1'];
$quantiteE2 = $itemsCraft['quantiteE2'];
$prixE1 = $itemsCraft['prixE1'];
$prixE2 = $itemsCraft['prixE2'];
$prixPotion = ($prixE1 * $quantiteE1) + ($prixE2 * $quantiteE2);

$itemE1Inventaire = getInventaireId($idJoueur,$idE1);
$quantiteE1Stock = $itemE1Inventaire['quantite'];

$itemE2Inventaire = getInventaireId($idJoueur,$idE2);
$quantiteE2Stock = $itemE2Inventaire['quantite'];



if($quantiteE1Stock != null){
    if($quantiteE1Stock < $quantiteE1){
        $prixPotion = $prixPotion - ($quantiteE1Stock * $prixE1);
    }else{
        $prixPotion -= ($prixE1 * $quantiteE1);
    }

}

if($quantiteE2Stock != null){
    if($quantiteE2Stock < $quantiteE2){
        $prixPotion = $prixPotion - ($quantiteE2Stock * $prixE2);
    }else{
        $prixPotion -= ($prixE2 * $quantiteE2);
    }

}

$bouton = "";
if($_SESSION['Type'] == "Alchimiste"){
    $cheminAjoutPanier = "DAL/fonctionPanoramix.php?idJoueur=" . $idJoueur . "&idItem=" . $idItem . "&idE1=" . $idE1 . "&idE2=" . $idE2 . "&quantiteE1=" . $quantiteE1 . "&quantiteE2=" . $quantiteE2 . "&soldePayer=" . $prixPotion;
    $bouton = <<<HTML
                
                <form action= $cheminAjoutPanier method="post">
                    <input type="submit" name="concocter" value="Concocter">
                </form>
    HTML;
}else{
    $bouton = <<<HTML
                <div>Vous devez être alchimiste</div>
    HTML;
}
$viewContent = <<<HTML
                    
                        <h1 style="margin-left:20px">$nomPotion</h1>
                        <div>
                            <div>Élément 1: $nomE1 $quantiteE1 X</div>
                            <div>Élément 2: $nomE2 $quantiteE2 X</div>
                        </div>
                        <div>$prixPotion$</div>
                        $bouton
                        


                HTML;

include_once 'views/master.php';
