<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'DAL/ChevalreskDB.php';

$viewName = "itemList";
userAccess();
$viewTitle = "items";
$list = ItemTable()->get();
$viewContent = "<div class='itemsLayout'>";
$isAdmin = (bool) $_SESSION["isAdmin"];
$owneritems = false;
if (isset($_GET["sort"]))
    $_SESSION["itemSortType"] = $_GET["sort"];
$sortType = $_SESSION["itemSortType"];

// function compareOwner($a, $b)
// {
//     $ownerName_A = no_Hyphens(UsersTable()->get($a->OwnerId)->Name);
//     $ownerName_B = no_Hyphens(UsersTable()->get($b->OwnerId)->Name);
//     return strcmp($ownerName_A, $ownerName_B);
// } 
//faire le meme avec type






foreach ($list as $item) {
    
        $id = strval($item->Id);
        $title = $item->nom;
        $image = $item->photo;

        
        
            $itemHTML = <<<HTML
                <div class="itemLayout" item_id="$id">
                    <div class="itemTitleContainer" title="$description">
                        <div class="itemTitle ellipsis">$nom</div>
                        $editCmd
                    </div>
                    <a href="itemDetails.php?id=$id">
                        
                        
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
