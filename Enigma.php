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
}

if (!isset($_SESSION['Enigme'])) {
    $viewContent = <<<HTML
    <div style="text-align: center;">
    <h1>Choisissez une difficultée</h1>
    <a href="fetchEnigma.php">
        <button style="height:30px; width:100px;">Facile</button>
    </a>
    <a href="fetchEnigma.php">
        <button style="height:30px; width:100px;">Intermédiaire</button>
    </a>
    <a href="fetchEnigma.php">
        <button style="height:30px; width:100px;">Expert</button>
    </a>
    </div>
    HTML;
} else {
    $viewContent = <<<HTML
    <div style="text-align: center;">
    <h1>$Enigme</h1>
    HTML;
}
include "views/master.php";
