<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: index.php');
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

$headTitle = "Hypnos - Réservations";
$logo = "assets/logo.PNG";
$footerjs = "js/main.js";

$generalcss = "css/general.css";
$pageCss = "css/myReserve.css";

$userId = $_SESSION["user"]["id"];

include 'header.php';

$sqlReserve = "SELECT `id`, `nom`, `adresse`, `date_debut`, `date_fin`, `suite`, `id_user`, `hotel_id` FROM `reservations` WHERE `id_user` = '$userId'";

require_once 'connect.php';

$query = $db->prepare($sqlReserve);
$query -> execute();
$reserves = $query->fetchAll();

?>

<h1>Mes réservations</h1>

<?php foreach($reserves as $reserve): ?>
<div class="reserv">
<p>Numéro de réservation: <strong><?=$reserve["id"]?></strong></p>
<h5>Nom de l'hôtel: <?=$reserve["nom"]?></h5>
<p>Adresse: <strong><?=$reserve["adresse"]?></strong></p>

<p>Date de début de séjour: <strong class="date_start"><?=$reserve["date_debut"]?></strong></p>
<p>Date de fin de séjour: <strong class="date_end"><?=$reserve["date_fin"]?></strong></p>

<form action="auth_confirm/del_reserve.php" method="post">
    <textarea name="reserv_id"><?=$reserve["id"]?></textarea>

    <textarea name="date_debut"><?=$reserve["date_debut"]?></textarea>
    <textarea name="date_fin"><?=$reserve["date_fin"]?></textarea>

    <button class="annulBtn" type="submit">Annuler cette réservation</button>
    <p>( maximum 3 jours à l'avance )</p>
</form>
</div>

<?php endforeach;?>

<script type="text/javascript">

    let annulBtn = document.querySelector('.annulBtn')
    let actualDate = new Date()
    let date_start = document.querySelector('.date_start').innerHTML
    let dateStart = new Date(date_start)

    for(let i = dateStart.getDate(); i < (actualDate.getDate()) - 2; i++){
        if(i >= actualDate.getDate() - 2){
            annulBtn.style.display = "none"
            console.log("Annulation désactivé")
        }
    }

</script>
<?php

include 'footer.php';

?>