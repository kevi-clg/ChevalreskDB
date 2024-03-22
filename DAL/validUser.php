<?php

function isValidUser(){
    if($_SESSION['ValidUser'] == true){
        return true;
    }
    return false;
}
