<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';

$viewName = "itemList";
//userAccess();
$viewTitle = "items";
if(!isvalidUser()){
    redirect("LoginForm.php");
}

$viewContent = "<div class='itemsLayout'>";
//$isAdmin = (bool) $_SESSION["isAdmin"];
$owneritems = false;
if (isset ($_GET["sort"]))
    $_SESSION["itemSortType"] = $_GET["sort"];
//$sortType = $_SESSION["itemSortType"];

// function compareOwner($a, $b)
// {
//     $ownerName_A = no_Hyphens(UsersTable()->get($a->OwnerId)->Name);
//     $ownerName_B = no_Hyphens(UsersTable()->get($b->OwnerId)->Name);
//     return strcmp($ownerName_A, $ownerName_B);
// } 
//faire le meme avec type

// $host = 'localhost';
//     $db = 'dbchevalersk18';
//     $user = 'root';
//     $password = '';
//     $charset = 'utf8';
//     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

//     try {
//         $conn = new PDO($dsn,$user,$password,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
//         echo "connexion établie <br>";
//     } catch (\Throwable $th) {
//         throw new PDOException($th->getMessage()) ;
//     }
$list = [];

$stmt = $conn->query("call selectAllItems()");
while ($row = $stmt->fetch()) {
    array_push($list, $row);
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
