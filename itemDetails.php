<?php

include_once 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionDetails.php';


if (!isset($_GET['id'])) {
    redirect('itemsList.php');
}

$viewName = "itemDetails";
//userAccess();


$idItem = $_GET['id'];
if (!isset($_SESSION['Id'])) {
    $idJoueur = -1;
} else {
    $idJoueur = $_SESSION['Id'];
}

$viewItem = "";
$item = RechercherItemId($idItem);
switch ($item['typee']) {
    case 'Arme':
       $item = RechercheArme($idItem);
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
        $item = RechercheArmure($idItem);
        $matiere = $item['matiere'];
        $taille = $item['taille'];
        $viewItem .= <<<HTML
                        <div>Matière: $matiere</div>
                        <div>Taille: $taille</div>
                        
       HTML;
        break;
    case 'Élément':
        $item = RechercheElement($idItem);
        $typeElement = $item['type'];
        $rarete = $item['rarete'];
        $dangerosite = $item['dangerosite'];
        $typeElement = $item['type'];
        $viewItem .= <<<HTML
                        <div>Rareté: $rarete/5</div>
                        <div>dangerosite: $dangerosite/10</div>
                        <div>Type: $typePotion</div>
        HTML;
        break;
    
    case 'Potion':
        $item = RecherchePotion($idItem);
        $typePotion = $item['type'];
        $effect = $item['effect'];
        $duree = $item['duree'];
        $viewItem .= <<<HTML
                        <div>Type: $typePotion</div>
                        <div>effet: $effect</div>
                        <div>Duree: $duree min</div>
        HTML;
        break;
}


$idItem = $item["idItem"];
$nom = $item['nom'];
$image = "data/images/items/" . $item['photo'];
$prix = $item["prix"];
$type = $item['typee'];
$quantite = $item['quantite'];


$cheminAjoutPanier = "DAL/fonctionDetails.php?idJoueur=" . $idJoueur . "&idItem=" . $idItem;

$viewContent = <<<HTML
                    <div>
                        <h1 style="margin-left:20px">$nom</h1>
                        <div class="detailsContainer">
                            <img class="imageDetails" src='$image'>
                            <div>
                                <div>Type: $type</div>
                                <div>Quantité en stock: $quantite</div>
                                <div>Prix: $prix$</div>
                                $viewItem

                            </div>
                        </div>
                        
                        
                        

                        <form action= $cheminAjoutPanier method="post">
                            <input type="submit" name="submit_button" value="Ajouter au panier">
                        </form>
                        

                    </div>


                HTML;


$listCommentaire = rechercheCommentaire($idItem);

foreach ($listCommentaire as $key => $comments) {
    $userImage = $comments['avatar'];
    $userAlias = $comments['alias'];
    $commentaire = $comments['commentaire'];
    $nbEtoile = $comments['nbEtoile'];
    $compteurEtoile = 0;

    $viewEtoile = "<div>";
    for($i=0; $i < 5; $i++) { 
        if($compteurEtoile < $nbEtoile){
            $viewEtoile .= "<i class='fa-solid fa-star'></i>";
        }
        else
        {
            $viewEtoile .= "<i class='fa-regular fa-star'></i></i>";
        }
        $compteurEtoile++;
    }
    $viewEtoile .= "</div>";
    $viewContent .= "<div class='commentairesContainer'>"; 

    $viewCommentaire = <<<HTML
                        <fieldset class='commentaireContainer'>
                            <div class="titreCommentaire">
                                <div class="UserAvatarSmall" style="background-image:url('$userImage')"></div>
                                <div style="margin-top:15px;margin-left:20px">$userAlias</div>
                            </div>    
                            $viewEtoile
                            <div>$commentaire</div>
                        </fieldset>
                    HTML;
    $viewContent .= $viewCommentaire;                
}




$viewTitle = "Détails de l'article: " . $nom;




include "views/master.php";




