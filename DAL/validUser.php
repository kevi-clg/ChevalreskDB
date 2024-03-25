<?php

function isvalidUser(){
    if($_SESSION['validUser'] == true){
        return true;
    }
    return false;
}
