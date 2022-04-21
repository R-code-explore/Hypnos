<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: account.php');
    exit;
}
$firstMenu = "Accueil";
$secondMenu = "Contact";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'index.php';
$secondBtn = 'contact.php';
$thirdBtn = "index.php#discover";
$fourthBtn = 'auth.php';

$headTitle = "Hypnos - Authentification";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/login.css";

include 'header.php';

?>
<h1>Inscription ou connexion</h1>

<div class="auth_block">
<a class="auth_options" href="singin.php">S'inscrire</a>
<br>
<a class="auth_options" href="login.php">Se connecter</a>
</div>

<?php

include 'footer.php';

?>