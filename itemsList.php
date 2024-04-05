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
} else {
    $stmt = $conn->query("call selectAllItems()");
    while ($row = $stmt->fetch()) {
        array_push($list, $row);
    }
    
}

##itemDetails.php?id=$id

foreach ($list as $item) {


    $id = $item["idItem"];
    $nom = $item['nom'];
    $image = "data/images/items/" . $item['photo'];



    $itemHTML = <<<HTML
                
                <div class="itemLayout" item_id="$id">
                    <div class="itemTitleContainer" title="$nom">
                        <div class="itemTitle ellipsis">$nom</div>
                        
                    </div>
                    <a href="itemDetails.php?id=$id">
                        <div class="itemImage" style="background-image:url('$image')">
                            
                            
                        </div>
                        <div class="itemCreationDate"> 
                            
                            
                        </div>
                    </a>
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
