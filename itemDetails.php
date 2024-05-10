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

if(isset($_GET['solde'])){
    $message = "<div style='margin-top:20px; margin-left:20px'>Votre solde est insuffisant</div>";
}else{
    $message= "";
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
$itemsCraft = RechercherItemId($idItem);
switch ($itemsCraft['typee']) {
    case 'Arme':
       $itemsCraft = RechercheArme($idItem);
       $efficacite = $itemsCraft['efficacite'];
       $genre = $itemsCraft['genre'];
       $description = $itemsCraft['descriptionArme'];        
       $viewItem .= <<<HTML
                        <div>Efficacité: $efficacite</div>
                        <div>Nombre de mains: $genre</div>
                        <div>Description: $description</div>
       HTML;
        break;
    
    case 'Armure':
        $itemsCraft = RechercheArmure($idItem);
        $matiere = $itemsCraft['matiere'];
        $taille = $itemsCraft['taille'];
        $viewItem .= <<<HTML
                        <div>Matière: $matiere</div>
                        <div>Taille: $taille</div>
                        
       HTML;
        break;
    case 'Élément':
        $itemsCraft = RechercheElement($idItem);
        $typeElement = $itemsCraft['type'];
        $rarete = $itemsCraft['rarete'];
        $dangerosite = $itemsCraft['dangerosite'];
        $typeElement = $itemsCraft['type'];
        $viewItem .= <<<HTML
                        <div>Rareté: $rarete/5</div>
                        <div>dangerosite: $dangerosite/10</div>
                        <div>Type: $typePotion</div>
        HTML;
        break;
    
    case 'Potion':
        $itemsCraft = RecherchePotion($idItem);
        $typePotion = $itemsCraft['type'];
        $effect = $itemsCraft['effect'];
        $duree = $itemsCraft['duree'];
        $viewItem .= <<<HTML
                        <div>Type: $typePotion</div>
                        <div>effet: $effect</div>
                        <div>Duree: $duree min</div>
        HTML;
        break;
}


$idItem = $itemsCraft["idItem"];
$nom = $itemsCraft['nom'];
$image = "data/images/items/" . $itemsCraft['photo'];
$prix = $itemsCraft["prix"];
$type = $itemsCraft['typee'];
$quantite = $itemsCraft['quantite'];
$itemMoyenne = MoyenneEtoile($idItem);
$moyenneEtoile = numval($itemMoyenne['moyenne']);
$viewMoyenneEtoile = "<div>";
$compteurEtoile = 1;
if(is_int((int)$moyenneEtoile)){
    for($i=0; $i < 5; $i++) { 
        if($compteurEtoile <= $moyenneEtoile){
            $viewMoyenneEtoile .= "<i class='fa-solid fa-star'></i>";
        }
        else
        {
            $viewMoyenneEtoile .= "<i class='fa-regular fa-star'></i></i>";
        }
        $compteurEtoile++;
    }
   
}else{
    for($i=0; $i < 5; $i++) { 
        if($compteurEtoile < round($moyenneEtoile)){
            $viewMoyenneEtoile .= "<i class='fa-solid fa-star'></i>";
        }
        else if($compteurEtoile > round($moyenneEtoile))
        {
            $viewMoyenneEtoile .= "<i class='fa-regular fa-star'></i></i>";
        }else{
            $viewMoyenneEtoile .= "<i class='fa-solid fa-star-half-stroke'></i>";
        }
        $compteurEtoile++;
    }
}
 $viewMoyenneEtoile .= "</div>";

$cheminAjoutPanier = "DAL/fonctionDetails.php?idJoueur=" . $idJoueur . "&idItem=" . $idItem;

if($itemsCraft['typee'] == "Potion"){
    $bouton = <<<HTML
                <a href="panoramix.php?idItem=$idItem" class="button" >Panoramix</a>
    HTML;
}else{
    $bouton = <<<HTML
                <form action= $cheminAjoutPanier method="post">
                    <input type="submit" name="AjouterPanier" value="Ajouter au panier">
                </form>
                        
    HTML;
}
if($type != "Potion"){
    $viewPrix = <<<HTML
                    <div>Prix: $prix$</div>
    HTML;
}else{
    $viewPrix = "";
}

$viewContent = <<<HTML
                    <div>
                        <h1 style="margin-left:20px">$nom</h1>
                        <div class="detailsContainer">
                            <img class="imageDetails" src='$image'>
                            <div>
                                <div>Type: $type</div>
                                <div>Quantité en stock: $quantite</div>
                                $viewPrix
                                $viewItem
                                <div style="display: flex;grid-template-columns: auto 110px;">
                                   <span> $viewMoyenneEtoile</span>
                                    <span>$moyenneEtoile</span>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div style="display:flex">
                            $bouton
                            $message
                        </div>
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




