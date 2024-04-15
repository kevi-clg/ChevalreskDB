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

    
    $nom = $item_Panier['nom'];
    $prix = $item_Panier['prix'];
    $quantite = $item_Panier['quantite'];

    $itemHTML = <<<HTML
                
                <tr class="itemPanierContainer" title="$nom">
                    
                    <td class="itemPanier"> $nom </td>
                    <td class="itemPanier"> $prix $</td>
                    <td class="itemPanier"> 
                        <input type="button" value="-" onclick>
                        $quantite
                        <input type="button" value="+">
                    </td>
                    <td class="itemPanier"> 
                        <input type="button" value="supprimer">
                    </td>

                </tr>                      
            HTML;
    $viewContent = $viewContent . $itemHTML;


}
$viewContent = $viewContent . "</table>";
$viewScript = <<<HTML
    <script defer>
        $("#setitemOwnerSearchIdCmd").on("click", function() {
            window.location = "setitemOwnerSearchId.php?id=" + $("#userSelector").val();
        });
        $("#setSearchKeywordsCmd").on("click", function() {
            window.location = "setSearchKeywords.php?keywords=" + $("#keywords").val();
        });
    </script>
HTML;
include "views/master.php";
