<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: account.php');
    exit;
}
//RewriteEngine On
//RewriteCond %{REQUEST_URI} !\.(png|jpg|jpeg)$
//RewriteRule .*$ - [F]

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
<h1>Inscription</h1>

<form action="auth_confirm/singin_confirm.php" method="post">
    <input type="text" name="nom" id="nom" placeholder="nom et prenom" required>
    <input type="email" name="email" id="email" placeholder="votre email" required>
    <input type="password" name="password" id="password" required>

    <button type="submit">S'inscrire</button>
</form>

<?php

include 'footer.php';

?>