<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';


anonymousAccess();
LoginJoueur($_POST['Alias'], $_POST['Password']);
if($_SESSION['validUser'] == true)
{
    redirect('itemsList.php');
}
redirect('LoginForm.php'); 