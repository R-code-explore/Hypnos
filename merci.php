<?php
session_start();

$firstMenu = "Accueil";
$secondMenu = "Réserver";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'index.php';
$secondBtn = 'book.php';
$thirdBtn = "index.php#discover";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Contact";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/contact.css";

include 'header.php';

?>

<h1 class="merci">Hypnos vous remercie pour votre message !</h1>
<h1><a href="index.php">Accueil</a></h1>
<?php
include 'footer.php';
?>