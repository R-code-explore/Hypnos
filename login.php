<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: account.php');
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

$headTitle = "Hypnos - Authentification";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/login.css";

include 'header.php';

?>
<h1>Connexion</h1>
<form action="auth_confirm/login_confirm.php" method="post">
    <input type="email" name="email" id="email" placeholder="votre email" required>
    <input type="password" name="password" id="password" placeholder="mot de passe" required>

    <button type="submit">Se connecter</button>
</form>

<?php

include 'footer.php';

?>