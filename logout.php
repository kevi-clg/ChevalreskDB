<?
require 'php/sessionManager.php';
userAccess();
unset($_SESSION['Id']);
unset($_SESSION['Alias']);
unset($_SESSION['Prenom']);
unset($_SESSION['Nom']);
unset($_SESSION['Solde']);
unset($_SESSION['Type']);
unset($_SESSION['Demande']);
unset($_SESSION['Password']);
unset($_SESSION['validUser']);

redirect('LoginForm.php');