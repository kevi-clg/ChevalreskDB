<?php
require 'php/sessionManager.php';
$viewTitle = "Modification de profile";

anonymousAccess();

$Alias = $_SESSION['Alias'];
$Prenom= $_SESSION['Prenom'];
$Nom = $_SESSION['Nom'];
$MotdePasse = $_SESSION['Password'];
$photo = $_SESSION['photo']; 

$viewContent = <<<HTML

    <div class="content loginForm">
        <br>
        <form method='post' action='EditJoueur.php'>
        <fieldset>
                <legend>Alias</legend>
                <input  type="text" 
                        class="form-control" 
                        name="Alias" 
                        id="Alias"
                        placeholder="Alias"
                        value = $Alias
                        required 
                        RequireMessage = 'Veuillez entrer votre Alias'
                        InvalidMessage = 'Alias invalide'/>
                
            </fieldset>
            
            <fieldset>
                <legend>Nom</legend>
                <input  type="text" 
                        class="form-control Alpha" 
                        name="Nom" 
                        id="Nom"
                        placeholder="Nom" 
                        value = $Nom
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
                        value = $Prenom
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
                        value = $MotdePasse
                        required 
                        RequireMessage = 'Veuillez entrer un mot de passe'
                        InvalidMessage = 'Mot de passe trop court'/>

                        
                <input  class="form-control MatchedInput" 
                        type="password" 
                        matchedInputId="Password"
                        name="matchedPassword" 
                        id="matchedPassword" 
                        value = $MotdePasse
                        placeholder="Vérification" required
                        InvalidMessage="Ne correspond pas au mot de passe" />
            </fieldset>
            
            <fieldset>
                <legend>Avatar</legend>
                <div class='imageUploader' 
                        controlId='Avatar' 
                        imageSrc='$photo' 
                        value='$photo'
                        waitingImage="images/Loading_icon.gif">
            </div>
            </fieldset>
            
            <input type='submit' name='submit' id='saveUser' value="Enregistrer" class="form-control btn-primary">
        </form>
        <div class="cancel">
            <a href="ProfileList.php">
                <button class="form-control btn-secondary">Retour</button>
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
