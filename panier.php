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
    $cheminAjoutPanier = "DAL/functions_Panier.php?idJoueur=".$idJoueur."&idItem=".$idItem;
    $cheminRetraitPanier = "DAL/functions_Panier.php?idJoueur=".$idJoueur."&idItem=".$idItem;
    if($quantite != 0)
    {
        $itemHTML = <<<HTML
                    
                    <tr class="itemPanierContainer" title="$nom">
                        
                        <td class="itemPanier"> $nom </td>
                        <td class="itemPanier"> $prix $</td>
                        <td class="itemPanier">
                            <form action= $cheminRetraitPanier method="post"> 
                                <input type="submit" name="EnleverPanier" value=" - ">
                            </form>
                            $quantite
                            <form action= $cheminAjoutPanier method="post">
                                <input type="submit" name="AjouterPanier" value=" + ">
                            </form>
                            
                        </td>
                        <td class="itemPanier"> 
                            <input type="button" value="supprimer">
                        </td>

                    </tr>                      
                HTML;
        $viewContent = $viewContent . $itemHTML;
    }

}
include "views/master.php";
