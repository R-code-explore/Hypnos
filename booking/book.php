<?php
$firstMenu = "Contact";
$secondMenu = "Accueil";
$thirdMenu = "Découvrir";
$fourthMenu = "Compte";


$firstBtn = '../public/contact.php';
$secondBtn = '../index.php';
$thirdBtn = "../index.php#discover";
$fourthBtn = '../connect/singin.php';

$headTitle = "Hypnos - Réservation";

$pageCss = "../css/book.css";
?>
    <?php
    include '../page_assets/header.php';
    ?>

    <h3 class="title-page">Page de réservation</h3>

    <!--Calendar-->
    <!--Calendar-->

    <form action="" method="">

        <label for="select">Séléction de l'hôtel</label>
        <select name="et-select" id="select" onchange="toggle(this)">
            <option value="">Sélectionnez un hotel</option>
            <option value="paris">Paris</option>
            <option value="lyon">Lyon</option>
            <option value="nice">Nice</option>
            <option value="mahon">Fort-Mahon</option>
        </select>

        <select name="choix_suite" id="suite_et1" class="suite-et1">
            <option value="1" >Suite 1</option>
            <option value="2" >Suite 1.2</option>
        </select>

        <select name="choix_suite" id="suite_et2" class="suite-et2">
            <option value="1" >Suite 2</option>
            <option value="2" >Suite 2.2</option>
        </select>

        <select name="choix_suite" id="suite_et3" class="suite-et3">
            <option value="1" >Suite 3</option>
            <option value="2" >Suite 3.2</option>
        </select>

        <select name="choix_suite" id="suite_et4" class="suite-et4">
            <option value="1" >Suite 4</option>
            <option value="2" >Suite 4.2</option>
        </select>

        <label for="date_start">Date de début du séjour</label>
        <input type="date" name="date_start" id="date_start" required placeholder="29/04/2022">
        <label for="date_end">Date de fin du séjour</label>
        <input type="date" name="date_end" id="date_end" required placeholder="29/04/2022">

        <button type="submit" class="bookBtn">Réserver</button>

    </form>

    <button id="bouton">Vérifier la disponibilité</button>

    <h5 class="dispo" id="dispo">Ici sera affiché la disponibilité</h5>

    <!---->
    <!---->

<script src="../js/booking.js"></script>

<div class="sep"></div>

    <?php
    include '../page_assets/footer.php';
    ?>

<div class="sep"></div>