<?php
require 'php/sessionManager.php';
$viewTitle = "Création de compte";

anonymousAccess();
$newImage = true;
$avatar = "images/no-avatar.png";
$aliasError = isset($_SESSION['ErreurAlias'])? $_SESSION['ErreurAlias'] : '';
$passwordError = isset($_SESSION['ErreurPassword'])? $_SESSION['ErreurPassword'] : '';
$viewContent = <<<HTML

    <div class="content loginForm">
        <br>
        <form method='post' action='Login.php'>
        <fieldset>
                <legend>Alias</legend>
                <input  type="text" 
                        class="form-control" 
                        name="Alias" 
                        id="Alias"
                        placeholder="Alias" 
                        required 
                        RequireMessage = 'Veuillez entrer votre Alias'
                        InvalidMessage = 'Alias invalide'
                        CustomErrorMessage ="Cette alias est déjà utilisé"/>
                        <span style='color:red'>$aliasError</span>
                
            </fieldset>
            <fieldset>
                <legend>Mot de passe</legend>
                <input  type="password" 
                        class="form-control" 
                        name="Password" 
                        id="Password"
                        placeholder="Mot de passe" 
                        required 
                        RequireMessage = 'Veuillez entrer un mot de passe'/>
                        <span style='color:red'>$passwordError</span>
            </fieldset>
   
            <input type='submit' name='submit' id='saveUser' value="Connecter" class="form-control btn-primary">
        </form>
        <div class="cancel">
            <a href="newJoueurForm.php">
                <button class="form-control btn-secondary">S'inscrire</button>
            </a>
        </div>

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