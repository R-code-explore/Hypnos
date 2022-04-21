<?php
session_start();
$firstMenu = "Accueil";
$secondMenu = "Contact";
$thirdMenu = "Réserver";
$fourthMenu = "Compte";

$firstBtn = 'index.php';
$secondBtn = 'contact.php';
$thirdBtn = "book.php";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Hotels";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/discover.css";

include 'header.php';
?>

    <?php

    require 'connect.php';

    $sqlHotels = "SELECT `id`, `nom`, `ville`, `adresse`, `description` FROM `hotels`";
    $queryHotels = $db->prepare($sqlHotels);
    $queryHotels->execute();
    $hotels = $queryHotels->fetchAll();

    $sqlSuites = "SELECT `first_image`, `glr_image1`, `glr_image2`, `glr_image3`, `id_hotel` FROM `suites`";
    $querySuites = $db->prepare($sqlSuites);
    $querySuites->execute();
    $suites = $querySuites->fetchAll();

    ?>

    <h1>Nos différents hôtels</h1>
    <?php foreach($hotels as $hotel):?> 
    <div class="hotel-presentation">       
    <div class="info">
        <h5>Nom de l'hôtel: <?=$hotel["nom"]?></h5>
        <p>Description: <?=$hotel["description"]?></p>
        <p>Adresse: <?=$hotel["adresse"] . ' ' . $hotel["ville"]?></p>
    </div>

    <?php foreach($suites as $suite): ?>
        <img src="./upload_images/<?=$suite["first_image"]?>">
        <div class="glr_imgs">
            <img src="./upload_images/<?=$suite["glr_image1"]?>">
            <img src="./upload_images/<?=$suite["glr_image2"]?>">
            <img src="./upload_images/<?=$suite["glr_image3"]?>">
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>

<?php
include 'footer.php';
?>