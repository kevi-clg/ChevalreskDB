<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include_once 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/functions_Panier.php';

if(!isvalidUser()){
    redirect("LoginForm.php");
}

$viewName = "Panier";
//userAccess();
$viewTitle = "Panier";
$itemListPage = true;
$filtre = "";

$viewContent = "<table>";

$list = [];

$stmt = RecherchePanier($_SESSION['Id']);
while ($row = $stmt->fetch()) {
    array_push($list, $row);
}

foreach ($list as $item_Panier) {

    $idJoueur = $item_Panier['idJoueur'];
    $idItem = $item_Panier['idItem'];
    $nom = $item_Panier['nom'];
    $prix = $item_Panier['prix'];
    $quantite = $item_Panier['quantite'];
    $cheminUrl = "DAL/fonctionDetails.php?idJoueur=".$idJoueur."&idItem=".$idItem;
    $itemHTML = <<<HTML
                
                <tr class="itemPanierContainer" title="$nom">
                    
                    <td class="itemPanier"> $nom </td>
                    <td class="itemPanier"> $prix $</td>
                    <td class="itemPanier"> 
                        <input type="button" value="-" onclick="">
                        $quantite
                        <form action="$cheminUrl" methode = "post">
                            <input type="submit" value="+" name="AjouterPanier">
                        </form>
                    </td>
                    <td class="itemPanier"> 
                        <input type="button" value="supprimer">
                    </td>

                </tr>                      
            HTML;
    $viewContent = $viewContent . $itemHTML;


}
include "views/master.php";
