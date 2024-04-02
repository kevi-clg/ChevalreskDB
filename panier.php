<?php

include 'php/sessionManager.php';
include 'php/formUtilities.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';

if(!isvalidUser()){
    redirect("LoginForm.php");
}