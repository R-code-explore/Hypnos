<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: auth.php');
    exit;
}elseif($_SESSION["user"]["nom"] === "Administrateur"){
    header('Location: admin.php');
    exit;
}elseif($_SESSION["user"]["role"] === "gerant"){
    header('Location: gerant.php');
    exit;
}

$firstMenu = "Contact";
$secondMenu = "Réserver";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'contact.php';
$secondBtn = 'book.php';
$thirdBtn = "#discover";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Compte";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/account.css";

include 'header.php';

?>

<h1>Bonjour <?=$_SESSION["user"]["nom"]?></h1>

<a class="links" href="logout.php">Déconnexion</a>

<a class="links" href="myReserve.php">Voir mes réservations</a>

<?php

include 'footer.php';

?>