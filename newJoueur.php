<?php
require 'php/sessionManager.php';
require 'DAL/ChevalreskDB.php';


anonymousAccess();
JoueursTable()->insert(new Joueur($_POST));
redirect('newJoueurForm.php'); 