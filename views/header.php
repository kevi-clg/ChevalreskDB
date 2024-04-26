<?php
$pageTitle = "Chevalresk";
if (!isset($viewTitle))
    $viewTitle = "";
if (!isset($viewHeadCustom))
    $viewHeadCustom = "";
if (!isset($viewName))
    $viewName = "";

if (!isset($itemListPage))
    $itemListPage = false;

$loggedUserMenu = "";
$connectedUserAvatar = "";

if ($itemListPage) {
    $searchBar = <<<HTML
        <div class="dropdown">
            <button class="dropbtn">Filtres</button>
            <div class="dropdown-content">
            <label><input type="checkbox" id="option1" value="Arme" onchange="handleChange()">Armes</label>
            <label><input type="checkbox" id="option2" value="Armure" onchange="handleChange()">Armures</label>
            <label><input type="checkbox" id="option3" value="Élément" onchange="handleChange()">Éléments</label>
            <label><input type="checkbox" id="option4" value="Potion" onchange="handleChange()">Potions</label>
            <button onclick="Refresh()">Appliquer</button>
            </div>
        </div>
    HTML;
} else {
    $searchBar = "";
}

if (isset($_SESSION["validUser"])) {


    $avatar = $_SESSION["photo"];
    $userName = $_SESSION["Alias"];


    $loggedUserMenu = "";
    if (isset($_SESSION["isAdmin"]) && (bool) $_SESSION["isAdmin"]) {
        $loggedUserMenu = <<<HTML
            <a href="manageUsers.php" class="dropdown-item">
                <i class="menuIcon fas fa-user-cog mx-2"></i> Gestion des usagers
            </a>
            <div class="dropdown-divider"></div>
        HTML;
    }

    $loggedUserMenu .= <<<HTML
        <a href="logout.php" class="dropdown-item">
            <i class="menuIcon fa fa-sign-out mx-2"></i> Déconnexion
        </a>
        <a href="ProfileEditForm.php" class="dropdown-item">
            <i class="menuIcon fa fa-user-edit mx-2"></i> Modifier votre profil
        </a> 
        <div class="dropdown-divider"></div>
        <a href="itemsList.php" class="dropdown-item">
            <i class="menuIcon fa fa-sign-out mx-2"></i> Liste d'items
        </a>
        <div class="dropdown-divider"></div>
        <a href="Enigma.php" class="dropdown-item">
            <i class="menuIcon fa fa-sign-out mx-2"></i> Enigma
        </a>
    HTML;

    $connectedUserAvatar = <<<HTML
        <div class="UserAvatarSmall" style="background-image:url('$avatar')" title="$userName"></div>
    HTML;
} else {
    $loggedUserMenu = <<<HTML
        <a href="loginForm.php" class="dropdown-item" id="loginCmd">
            <i class="menuIcon fa fa-sign-in mx-2"></i> Connexion
        </a> 
        <div class="dropdown-divider"></div>
        <a href="itemsList.php" class="dropdown-item">
            <i class="menuIcon fa fa-sign-out mx-2"></i> Liste d'items
        </a>
        <div class="dropdown-divider"></div>
        <a href="inventaire.php" class="dropdown-item">
            <i class="menuIcon fa fa-sign-out mx-2"></i> Inventaire
        </a>
    HTML;
    $connectedUserAvatar = <<<HTML
        <div>&nbsp;</div>
    HTML;
}



$viewMenu = "";


$viewHead = <<<HTML
        <a href="itemsList.php" title="Accueil"><img src="images/ChevalreskLogo.png" class="appLogo"></a>
        <span class="viewTitle">
            $viewTitle   
        </span>
        
        <div class="headerMenusContainer">
            <span></span><!--filler-->
            <span>$searchBar</span> 
            <a href="panier.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
            
            <a href="ProfileList.php" title="Modifier votre profil"> $connectedUserAvatar </a>         
            <div class="dropdown ms-auto dropdownLayout">
                <div data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="cmdIcon fa fa-ellipsis-vertical"></i>
                </div>
                <div class="dropdown-menu noselect">
                    $loggedUserMenu
                    $viewMenu
                    <div class="dropdown-divider"></div>
                    <a href="about.php" class="dropdown-item" id="aboutCmd">
                        <i class="menuIcon fa fa-info-circle mx-2"></i> À propos...
                    </a>
                </div>
            </div>

        </div>
    HTML;

