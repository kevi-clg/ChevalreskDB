<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';


anonymousAccess();
unset($_SESSION['ErreurAlias']);
unset($_SESSION['ErreurPassword']);

if (CheckAlias(($_POST['Alias'])) == true) {
    LoginJoueur($_POST['Alias'], $_POST['Password']);
}
if ($_SESSION['validUser'] == true) {
    redirect('itemsList.php');
} else {
    $_SESSION['ErreurAlias'] = "Alias Invalide";


    redirect('LoginForm.php');
}

