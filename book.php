<?php
session_start();

$firstMenu = "Accueil";
$secondMenu = "Contact";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'index.php';
$secondBtn = 'contact.php';
$thirdBtn = "index.php#discover";
$fourthBtn = 'auth.php';

$headTitle = "Hypnos - Réservation";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/book.css";

include 'header.php';

//Récupération données formulaire
require_once 'connect.php';

$dataHotelsRequires = "SELECT `id`, `nom`, `ville`, `adresse`, `description` FROM `hotels`";

$query = $db->prepare($dataHotelsRequires);
$query->execute();
$hotels = $query->fetchAll();

?>

<style>
    .hotel_id, textarea{display: none;}
</style>

<h1 class="title-page">Réservation, veuillez choisir un établissement</h1>

<?php foreach($hotels as $hotel): ?>
<form action="book_set.php" method="post" class="hotel">

    <textarea class="hotel_id" name="hotel_id"><?=$hotel["id"];?></textarea>
    
    <h5>Nom de l'hôtel: <?=$hotel["nom"];?></h5>
    <textarea name="nom_hotel"><?=$hotel["nom"]?></textarea>
    
    <p>adresse: <?=$hotel["adresse"] . ' ' . $hotel["ville"];?></p>
    <textarea name="adresse"><?=$hotel["adresse"] . ' ' . $hotel["ville"];?></textarea>

    <p><?=$hotel["description"];?></p>
    <?php 
    
    $hotelId = $hotel["id"];

    $dataSuitesRequires = "SELECT `nom`, `first_image`, `description`, `prix`, `glr_image1`, `glr_image2`, `glr_image3`, `dispo` FROM `suites` WHERE `id_hotel` = '$hotelId'";

    $querySuites = $db->prepare($dataSuitesRequires);
    $querySuites->execute();
    $suites = $querySuites->fetchAll();

    ?>
    <?php foreach($suites as $suite): ?>
    <!--Carousel d'images-->
    <!--Carousel d'images-->
    <div class="carousel_display">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./upload_images/<?=$suite["first_image"]?>" class="d-block w-100">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./upload_images/<?=$suite["glr_image1"]?>" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="./upload_images/<?=$suite["glr_image2"]?>" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="./upload_images/<?=$suite["glr_image3"]?>" class="d-block w-100">
    </div>
  </div>
</div>
    </div>
<!---->
<!---->
    <?php endforeach;?>
    <button type="submit">Réserver dans cet hôtel</button>
    <br>
    <a href="hotels.php">En savoir plus sur l'hotel</a>
</form>
<?php endforeach; ?>

<?php

include 'footer.php';

?>