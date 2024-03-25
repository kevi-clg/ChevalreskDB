<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';


anonymousAccess();
unset($_SESSION['ErreurDoublon']);
if (!CheckAlias(($_POST['Alias']))) {
    Create_Joueur($_POST['Alias'], $_POST['Prenom'], $_POST['Nom'], $_POST['Password']);
}
else
{
    $_SESSION['ErreurDoublon'] = "Alias déjà utlisé";
    redirect('newJoueurForm.php');
}
redirect('LoginForm.php');