<?php
require 'php/sessionManager.php';
$viewTitle = "Profile";

userAccess();
$newImage = true;

$viewContent = <<<HTML
<ul>
    <li>Alias: {$_SESSION['Alias']}</li>
    <li>Prénom: {$_SESSION['Prenom']}</li>
    <li>Nom: {$_SESSION['Nom']}</li>
    <li>Solde: {$_SESSION['Solde']}</li>
    <li>Niveau: {$_SESSION['Niveau']}</li>
    <li>Type: {$_SESSION['Type']}</li>
    <li>Mot de passe: {$_SESSION['Password']}</li>
    <li>Photo: <img src="{$_SESSION['photo']}" alt="Avatar"></li>
</ul>

<div class="cancel">
            <a href="ProfilEditForm.php">
                <button class="form-control btn-secondary">Modifier le Profile</button>
            </a>
        </div>
HTML;

$viewScript = <<<HTML
        <script src='js/validation.js'></script>
        <script src='js/imageControl.js'></script>
        <script defer>
            initFormValidation();
            $("#addPhotoCmd").hide();
            addConflictValidation('testConflict.php', 'Email', 'saveUser' );
        </script>
    HTML;
include "views/master.php";
