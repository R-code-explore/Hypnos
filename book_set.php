<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: auth.php');
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

$headTitle = "Hypnos - Réservation";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "";

include 'header.php';

    require_once 'connect.php';

    $hotel_id = $_POST["hotel_id"];
    $nomHotel = $_POST["nom_hotel"];
    $adresse = $_POST["adresse"];

    $dataSuitesRequires = "SELECT `nom`, `first_image`, `description`, `prix`, `glr_image1`, `glr_image2`, `glr_image3`, `dispo` FROM `suites` WHERE `id_hotel` = '$hotel_id'";

    $querySuites = $db->prepare($dataSuitesRequires);
    $querySuites->execute();
    $suites = $querySuites->fetchAll();

    $datesRequires = "SELECT * FROM `reservations` WHERE `hotel_id` = $hotel_id";

    $queryDates = $db->prepare($datesRequires);
    $queryDates->execute();
    $dates = $queryDates->fetchAll();

?>

<h1>Espace réservation</h1>

<button class="check_suites">Regarder les suites</button>

<h5 class="hotel_name">Nom de l'hotel: <?=$nomHotel?></h5>
<p class="hotel_adresse">Rappel de l'adresse: <?=$adresse;?></p>

<form action="./auth_confirm/reserv_confirm.php" method="post">
<textarea name="nom_hotel"><?=$nomHotel;?></textarea>
<textarea name="adresse"><?=$adresse?></textarea>
<textarea name="hotel_id"><?=$hotel_id;?></textarea>


<select name="select_suites">
    <?php foreach($suites as $suite): ?>
    <option><?=$suite["nom"]?></option>
    <?php endforeach; ?>
</select>

<div class="dates">
    <label for="date_start">Date de début séjour</label>
    <input type="date" name="date_start" id="date_start" class="date_start">

    <label for="date_end">Date de fin séjour</label>
    <input type="date" name="date_end" id="date_end" class="date_end">
</div>

<button type="submit" class="reserv">Réserver</button>

</form>
<div class="display_div">
        <br>
        <strong class="dispo_annonce">Une réservation pour les dates ci dessous ne seront pas prises en compte, ces dates étant déjà prise:</strong>
        <br>
        <?php foreach($dates as $date): ?>
        <p><strong>Nom de la suite: </strong><?=$date["nom"]?></p>
        <strong>Dates occupés: </strong>
        <p>Du: <?=$date["date_debut"]?></p>
        <p>Au: <?=$date["date_fin"]?></p>
        <?php endforeach; ?>
</div>

<div class="suites suite_block">

<?php foreach($suites as $suite): ?>
    <div class="suite_present">  
    
    <p class="title_suite"><?=$suite["nom"]?></p>

    <img class="first_image" src="./upload_images/<?=$suite["first_image"]?>">

    <p class="description"><?=$suite["description"]?></p>
    <p class="prix">Tarif (fixe): <?=$suite["prix"]?>€</p>

    <div class="glr_images">
        <img class="images" src="./upload_images/<?=$suite["glr_image1"]?>">
        <img class="images" src="./upload_images/<?=$suite["glr_image2"]?>">
        <img class="images" src="./upload_images/<?=$suite["glr_image3"]?>">
    </div>

    </div>

    <?php endforeach; ?>

</div>

<!--Styles-->
<style>

textarea{
    display: none;
}

body{
    margin:0;
    background: black;
    color: white;
}
h1{
    display: block;
    width: 40%;
    margin: 60px 20%;
}

form{
    display: block;
    width: 80%;
    max-width: 750px;
    padding: 15px;
    margin: 80px auto;
    background: #5161D9;
    border-radius: 10px;
}

form label, form select, form input{
    display: block;
    width: 80%;
    padding: 15px;
    margin: 20px auto;
}
 .check_suites, .reserv{
    display: block;
    background: none;
    border: 1px solid white;
    border-radius: 5px;
    width: 250px;
    padding: 10px;
    color: white;
    margin:10px auto;
    text-align: center;
}

.display_div{
    display: block;
    width: 80%;
    max-width: 750px;
    padding: 15px;
    margin: 80px auto;
    border: 1px solid white;
    border-radius: 10px;
    font-size: 1.2em;
}.display_div strong{
    color: #5161D9;
}

.hotel_name, .hotel_adresse{
    display: block;
    width: 40%;
    margin: 40px 20%;
}

/**Modal display**/
/**Modal display**/

.suites{
    display: block;
    position: absolute;
    top:300px;
    left:50%;
    transform:translateX(-50%);
    width: 80%;
    max-width: 650px;
    background: rgba(0, 0, 0, 0.9);
    border: 1px solid white;
    border-radius: 10px;
    padding: 15px;
}.suite_present{
    display: block;
    width: 80%;
    margin: 20px auto;
}.first_image{
    display: block;
    width: 80%;
    height: 120px;
    object-fit:cover;
    margin: 20px auto;
}.glr_images{
    display: flex;
    width: 90%;
    justify-content: space-between;
    margin:20px auto;
}.glr_images img{
    display: flex;
    width: 40%;
    height: 140px;
    margin:auto;
}

</style>

<script type="text/javascript">

//Check suites
    modalInit();

    function modalInit(){
        let suiteModal = document.querySelector('.suites')
        suiteModal.style.display = "none"
    }
    let suiteModal = document.querySelector('.suites')
    let buttonSuites = document.querySelector('.check_suites')

    buttonSuites.addEventListener('click', () => {
        if(suiteModal.style.display == "none"){
            suiteModal.style.display = "block"
        }else{
            suiteModal.style.display = "none"
        }
    })

    //Check disponibilités
    let phpDays_start = document.querySelectorAll('.start_dates')
    let day_start = document.querySelectorAll('.date_start')

    let phpDays_end = document.querySelectorAll('.end_dates')
    let day_end = document.querySelector('.date_end')

    let displayDiv = document.querySelector('.displayDiv')

</script>

<?php

include 'footer.php';

?>

