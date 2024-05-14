<?php
require 'php/sessionManager.php';
$viewTitle = "Évaluation";
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionCommentaire.php';

anonymousAccess();
if(!isvalidUser()){
    redirect("LoginForm.php");
}

$idItem = $_GET["id"];
$idJoueur = $_SESSION['Id'];
$Commentaire = "";




$viewContent = <<<HTML

    <div class="content loginForm">
        <br>
        <form method='post' action='EditJoueur.php'>
        <fieldset>
                <legend>Commentaire</legend>
                <input  type="text" 
                        class="form-control" 
                        name="Commentaire" 
                        id="Commentaire"
                        placeholder="Commentaire"
                        value = "$Commentaire"
                        required 
                        RequireMessage = 'Veuillez entrer un commentaire'>
                <select id="etoile" name="nbEtoile">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                
            </fieldset>
            
            
           
            
            <input type='submit' name='AjouterCommentaire' id='evaluation' value="Enregistrer" class="form-control btn-primary">
        </form>
        <div class="cancel">
            <a href="inventaire.php.php">
                <button class="form-control btn-secondary">Retour</button>
            </a>
        </div>

    </div>
    HTML;
$viewScript = <<<HTML
        <script src='js/validation.js'></script>  
    HTML;
include "views/master.php";
