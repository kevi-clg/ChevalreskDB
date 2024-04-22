<?php
include 'php/sessionManager.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionDetails.php';
userAccess();


$viewName = "itemList";
$viewTitle = "items";
$itemListPage = true;
$viewContent = "<div class='itemsLayout'>";

$list = [];

$stmt = $conn->query("SELECT IdItem, quantite from inventaire where IdJoueur in (" . $_SESSION['Id']. ")");
while ($row = $stmt->fetch()) {
    array_push($list, $row);
}

foreach ($list as $item) {


    $id = $item["IdItem"];
    $quantite = $item['quantite'];
    $stmt = $conn->query("SELECT nom, photo, prix from items where idItem in (" . $id. ")");
    $item = $stmt->fetch();
    $nom = $item["nom"];
    $image = "data/images/items/" . $item['photo'];
    $prix = $item["prix"];



    $itemHTML = <<<HTML
                
                <div class="itemLayout" item_id="$id">
                    
                    <a href="iteminventaireDetails.php?id=$id">
                        <div class="itemInventaireImage" style="background-image:url('$image')">
                            
                            
                        </div>
                        <div class="itemCreationDate"> 
                            
                            
                        </div>
                    </a>
                    <div class="itemTitleContainer" title="$nom">
                        <div class="itemTitle ellipsis">$nom</div>
                        <div class="itemTitle ellipsis">$prix écus</div>
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
