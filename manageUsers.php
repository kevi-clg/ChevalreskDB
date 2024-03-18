<?php
include 'php/sessionManager.php';
require 'DAL/ChevalreskDB.php';

//adminAccess();

$viewTitle = "Gestion des usagers";
$list = JoueursTable()->get();
$viewContent = "";

foreach ($list as $Joueur) {
   
        $id = strval($Joueur->Id);
        $name = $Joueur->nom;
        $avatar = $Joueur->avatar;
        $alias = $Joueur->alias;
       
        
        
        $JoueurHTML = <<<HTML
        <div class="UserRow" User_id="$id">
            <div class="UserContainer noselect">
                <div class="UserLayout">
                    <div class="UserAvatar" style="background-image:url('$avatar')"></div>
                    <div class="UserInfo">
                        <span class="UserName">$name</span>
                        <a href="#" class="UserEmail" target="_blank" >$alias</a>
                    </div>
                </div>
               
            </div>
        </div>           
        HTML;
        $viewContent = $viewContent . $JoueurHTML;
    
}

$viewScript = <<<HTML
    <script src='js/session.js'></script>
    <script defer>
        $("#addPhotoCmd").hide();
    </script>
HTML;

include "views/master.php";
