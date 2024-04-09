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

$viewContent = "<div class='itemsLayout'>";

$list = [];

$stmt = RecherchePanier($_SESSION['Id']);
while ($row = $stmt->fetch()) {
    array_push($list, $row);
}

foreach ($list as $item_Panier) {

    $id = $item_Panier["idItem"];
    $nom = $item_Panier['nom'];
    $prix = $item_Panier['prix'];
    $

    $itemHTML = <<<HTML
                
                <div class="itemLayout" item_id="$id">
                    
                    <a href="itemDetails.php?id=$id">
                        <div class="itemImage" style="background-image:url('$image')">
                            
                            
                        </div>
                        <div class="itemCreationDate"> 
                            
                            
                        </div>
                    </a>
                    <div class="itemTitleContainer" title="$nom">
                        <div class="itemTitle ellipsis">$nom</div>
                        
                    </div>
                </div>                      
            HTML;
    $viewContent = $viewContent . $itemHTML;


}
$viewContent = $viewContent . "</div>";
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
