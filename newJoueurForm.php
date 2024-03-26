<?php
require 'php/sessionManager.php';
$viewTitle = "Création de compte";

anonymousAccess();
$newImage = true;
$avatar = "images/no-avatar.png";

$AliasErrror = isset($_SESSION['ErreurDoublon'])? $_SESSION['ErreurDoublon'] : '';

$viewContent = <<<HTML

    <div class="content loginForm">
        <br>
        <form method='post' action='newJoueur.php'>
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
                        <span style='color:red'>$AliasErrror</span>
                
            </fieldset>
            
            <fieldset>
                <legend>Nom</legend>
                <input  type="text" 
                        class="form-control Alpha" 
                        name="Nom" 
                        id="Nom"
                        placeholder="Nom" 
                        required 
                        RequireMessage = 'Veuillez entrer votre nom'
                        InvalidMessage = 'Nom invalide'/>
            </fieldset>
            <fieldset>
                <legend>Prénom</legend>
                <input  type="text" 
                        class="form-control Alpha" 
                        name="Prenom" 
                        id="Prenom"
                        placeholder="Prénom" 
                        required 
                        RequireMessage = 'Veuillez entrer votre prénom'
                        InvalidMessage = 'Prénom invalide'/>
            </fieldset>
            <fieldset>
                <legend>Mot de passe</legend>
                <input  type="password" 
                        class="form-control" 
                        name="Password" 
                        id="Password"
                        placeholder="Mot de passe" 
                        required 
                        RequireMessage = 'Veuillez entrer un mot de passe'
                        InvalidMessage = 'Mot de passe trop court'/>

                <input  class="form-control MatchedInput" 
                        type="password" 
                        matchedInputId="Password"
                        name="matchedPassword" 
                        id="matchedPassword" 
                        placeholder="Vérification" required
                        InvalidMessage="Ne correspond pas au mot de passe" />
            </fieldset>
            
            <fieldset>
                <legend>Avatar</legend>
                <div class='imageUploader' 
                        controlId='Avatar' 
                        imageSrc='$avatar' 
                        waitingImage="images/Loading_icon.gif">
            </div>
            </fieldset>
            
            <input type='submit' name='submit' id='saveUser' value="Enregistrer" class="form-control btn-primary">
        </form>
        <div class="cancel">
            <a href="loginForm.php">
                <button class="form-control btn-secondary">Se Connecter</button>
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
