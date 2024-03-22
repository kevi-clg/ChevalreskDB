<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';


anonymousAccess();
LoginJoueur($_POST['Alias'], $_POST['Password']);
if($_SESSION['ValidUser'] == true)
{
    redirect('list.php');
}
redirect('newJoueurForm.php'); 