<?php
session_start();
$firstMenu = "Contact";
$secondMenu = "Réserver";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";

$firstBtn = 'contact.php';
$secondBtn = 'book.php';
$thirdBtn = "#discover";
$fourthBtn = 'account.php';

$headTitle = "Hypnos - Accueil";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/index.css";
?>
    <?php
    include 'header.php';
    ?>

    <style>
        body{
            background-color: black;
        }
    </style>

    <div class="banner">
        <img src="assets/index-banner.jpg">

            <h3 class="mobile-title">Hypnos,<br>vous souhaite<br>la bienvenue</h3>
            <h3 class="desktop-title">Hypnos,<br>vous souhaite la bienvenue</h3>

            <div class="banner-btn-group">
                <a class="banner-btn general btn" href="#discover">Découvrir</a>
                <a class="banner-btn general-btn" href="book.php">Réserver</a>
            </div>

            <a href="#discover"><i class="gg-arrow-down-o"></i></a>
    </div>

    <div class="sep"></div>

    <div id="discover" class="discover">
        <h3>Découvrir Hypnos</h3>
        <p>Hypnos est un groupe hôtelier fondé en 2004. Propriétaire de 7 établissements dans les quatre coins de l’hexagone, chacun de ces hôtels s’avère être une destination idéale pour les couples en quête d’un séjour romantique à deux.</p>
        <a href="hotels.php">En savoir plus >></a>
    </div>

    <div class="sep"></div>

    <div class="carouselImages">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/index-hotel1.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Le luxe à votre portée</h5>
        <p>Découvrez un reveil au milieu d'un petit coin de paradis</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/index-hotel2.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h5>Un confort que vous ne pouvez refuser</h5>
        <p>La qualité de notre service est à la hauteur de vos plus hautes attentes</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/index-hotel3.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Vous relaxer</h5>
        <p>Se relaxer après une longue période de travail ou simplement parce qu'on le mérite</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    </div>

    <div class="sep"></div>

    <?php
    include 'footer.php';
    ?>

<div class="sep"></div>