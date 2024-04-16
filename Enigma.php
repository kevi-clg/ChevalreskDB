<?php
include 'php/sessionManager.php';
include 'php/date.php';
include 'views/connection.php';
include_once 'DAL/validUser.php';
include_once 'DAL/fonctionRecherche.php';
userAccess();
$viewName = "Enigma";

if (isset($_SESSION['Enigme'])) {
    $Enigme = $_SESSION['Enigme'];
    $Reponse1Txt = $_SESSION['Reponses'][0]['reponse'];
    $Reponse2Txt = $_SESSION['Reponses'][1]['reponse'];
    $Reponse3Txt = $_SESSION['Reponses'][2]['reponse'];
    $Reponse4Txt = $_SESSION['Reponses'][3]['reponse'];
}

if(isset($_SESSION['Message']))
{
    echo $_SESSION['Message'];
    unset($_SESSION['Message']);
}

if (!isset($_SESSION['Enigme'])) {
    $viewContent = <<<HTML
    <div style="text-align: center;">
    
    <h1>Choisissez une difficultée</h1>
    <a href="fetchEnigma.php?difficulty=1&type=0">
        <button style="height:30px; width:100px;">Facile</button>
    </a>
    <a href="fetchEnigma.php?difficulty=2&type=0">
        <button style="height:30px; width:100px;">Intermédiaire</button>
    </a>
    <a href="fetchEnigma.php?difficulty=3&type=0">
        <button style="height:30px; width:100px;">Expert</button>
    </a>
    <br>
    
    <h2>Question D'alchimiste</h2>
    <a href="fetchEnigma.php?difficulty=1&type=1">
        <button style="height:30px; width:100px;">Facile</button>
    </a>
    <a href="fetchEnigma.php?difficulty=2&type=1">
        <button style="height:30px; width:100px;">Intermédiaire</button>
    </a>
    <a href="fetchEnigma.php?difficulty=3&type=1">
        <button style="height:30px; width:100px;">Expert</button>
    </a>
    </div>
    HTML;
} else {
    $viewContent = <<<HTML
    <div style="text-align: center;">
    <h1>$Enigme</h1>
    <a href="AnswerClick.php?choice=0">
        <button style="height:30px; width:100px;">$Reponse1Txt</button>
    </a>
    <a href="AnswerClick.php?choice=1">
        <button style="height:30px; width:100px;">$Reponse2Txt</button>
    </a>
    <br>
    <br>
    <a href="AnswerClick.php?choice=2">
        <button style="height:30px; width:100px;">$Reponse3Txt</button>
    </a>
    <a href="AnswerClick.php?choice=3">
        <button style="height:30px; width:100px;">$Reponse4Txt</button>    
    </a>
    HTML;
}
include "views/master.php";
