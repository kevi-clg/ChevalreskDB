<?php

function isAdmin(){
    if($_SESSION['IsAdmin'] == 1){
        return true;
    }
    return false;
}