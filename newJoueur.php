<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';
include_once 'php/imageFiles.php';

anonymousAccess();
unset($_SESSION['ErreurDoublon']);

"data/images/avatars/";

$avatar = saveImage("data/images/avatars/", $_POST['Avatar']);

if (!CheckAlias(($_POST['Alias']))) {
    Create_Joueur($_POST['Alias'], $_POST['Prenom'], $_POST['Nom'], $_POST['Password'], $avatar);
}
else
{
    $_SESSION['ErreurDoublon'] = "Alias déjà utlisé";
    redirect('newJoueurForm.php');
}
redirect('LoginForm.php');