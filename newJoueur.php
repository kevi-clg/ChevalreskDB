<?php
require 'php/sessionManager.php';
require 'DAL/functions.php';


anonymousAccess();
Create_Joueur($_POST['Alias'], $_POST['Prenom'], $_POST['Nom'],$_POST['Password']);
redirect('newJoueurForm.php'); 