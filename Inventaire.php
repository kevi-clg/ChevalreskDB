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
$viewContent = "<div class='itemsLayoutInventaire'>";

$list = [];

$stmt = $conn->query("SELECT IdItem, quantite from inventaire where IdJoueur in (" . $_SESSION['Id'] . ")");
while ($row = $stmt->fetch()) {
    array_push($list, $row);
}

foreach ($list as $item) {


    $id = $item["IdItem"];
    $quantite = $item['quantite'];
    $stmt = $conn->query("SELECT nom, photo, prix, typee from items where idItem in (" . $id . ")");
    $item = $stmt->fetch();
    $nom = $item["nom"];
    $image = "data/images/items/" . $item['photo'];
    $prix = $item["prix"];
    $type = $item["typee"];

    switch ($item['typee']) {
        case 'Arme':
           $item = RechercheArme($id);
           $efficacite = $item['efficacite'];
           $genre = $item['genre'];
           $description = $item['descriptionArme'];        
           $viewItem .= <<<HTML
                            <div>Efficacité: $efficacite</div>
                            <div>Nombre de mains: $genre</div>
                            <div>Description: $description</div>
           HTML;
            break;
        
        case 'Armure':
            $item = RechercheArmure($id);
            $matiere = $item['matiere'];
            $taille = $item['taille'];
            $viewItem = <<<HTML
                            <div>Matière: $matiere</div>
                            <div>Taille: $taille</div>
                            
           HTML;
            break;
        case 'Élément':
            $item = RechercheElement($id);
            $typeElement = $item['type'];
            $rarete = $item['rarete'];
            $dangerosite = $item['dangerosite'];
            $typeElement = $item['type'];
            $viewItem = <<<HTML
                            <div>Rareté: $rarete/5</div>
                            <div>dangerosite: $dangerosite/10</div>
                            <div>Type: $typePotion</div>
            HTML;
            break;
        
        case 'Potion':
            $item = RecherchePotion($id);
            $typePotion = $item['type'];
            $effect = $item['effect'];
            $duree = $item['duree'];
            $viewItem = <<<HTML
                            <div>Type: $typePotion</div>
                            <div>effet: $effect</div>
                            <div>Duree: $duree min</div>
            HTML;
            break;
    }
    


    $itemHTML = <<<HTML
    <div class="itemLayout" item_id="$id">
        <a>
            <div class="flex-container">
                <div class="itemImage" style="background-image:url('$image')"></div>
                <div class="itemTitleContainerinventaire" title="$nom">
                    <div class="ellipsis">Nom: $nom</div>
                    <div class="ellipsis">Valeur: $prix écus</div>
                    $viewItem
                    
                </div>
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
