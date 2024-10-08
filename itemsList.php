<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionRecherche.php';

$viewName = "itemList";
//userAccess();
$viewTitle = "items";
$itemListPage = true;
$filtre = "";
if(isset($_GET['filtres'])){
    $filtre = $_GET['filtres'];
}
$viewContent = "<div class='itemsLayout'>";

$list = [];




if ($filtre != null) {
    

    $stmt = $conn->query("SELECT * from Items where typee in (" . $filtre . ")");

    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }

    foreach ($list as $key => $itemsCraft) {
        #sort par type
    }
} else {
    $stmt = $conn->query("call selectAllItems()");
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }
    
}

##itemDetails.php?id=$id

foreach ($list as $itemsCraft) {


    $id = $itemsCraft["idItem"];
    $nom = $itemsCraft['nom'];
    $image = "data/images/items/" . $itemsCraft['photo'];
    $prix = $itemsCraft["prix"];



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
                    <div class="itemTitle ellipsis">$prix écus</div>
                    
                        
                        
                    
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
