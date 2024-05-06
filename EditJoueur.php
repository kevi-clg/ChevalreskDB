<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';
include_once 'php/imageFiles.php';

userAccess();

unset($_SESSION['ErreurAliasEdit']);

$avatar = saveImage("data/images/avatars/", $_POST['Avatar'], $_POST['photo']);

$sessional= $_SESSION['Alias'];
$postal = $_POST['Alias'];
if($avatar == null)
{
    $avatar = $_SESSION['photo'];
}
if (!CheckAlias(($_POST['Alias'])) || $sessional == $postal) {
    EditJoueur($_POST['Alias'], $_POST['Prenom'], $_POST['Nom'], $_POST['Password'], $avatar, $_SESSION['Id']);
}
else
{
    $_SESSION['ErreurAliasEdit'] = "Alias déjà utlisé";
    redirect('ProfileList.php');
}